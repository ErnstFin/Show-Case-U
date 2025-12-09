<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv; // Import Model CV
use App\Models\WorkExperience; // Import Model WorkExperience
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    // 1. Tampilkan Form Buat CV
    public function create($template = null)
    {
        // Ambil data CV user beserta relasi workExperiences (jika ada)
        $cv = Cv::with('workExperiences')->where('user_id', Auth::id())->first();

        // Logika pemilihan template
        $selectedTemplate = $template ?: ($cv->template ?? 'template');

        // Kirim data ke view
        return view('cv.createCV', compact('cv', 'selectedTemplate'));
    }

    // 2. Simpan Data CV (Store)
    public function store(Request $request)
    {
        // A. VALIDASI DATA
        // Kita sesuaikan validasi dengan kolom database yang baru
        $validated = $request->validate([
            // Data Diri
            'full_name'  => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address'    => 'required|string',
            'summary'    => 'required|string',
            'skills'     => 'required|string',
            
            // Pendidikan (Kolom Baru)
            'university' => 'required|string',
            'major'      => 'required|string',
            'gpa'        => 'nullable|string',
            
            // Template & Foto
            'template'   => 'required|string',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Max 5MB

            // Pengalaman Kerja (Validasi Array)
            'work_experiences' => 'nullable|array',
            'work_experiences.*.company' => 'required_with:work_experiences|string',
            'work_experiences.*.position' => 'required_with:work_experiences|string',
            'work_experiences.*.start_date' => 'required_with:work_experiences|date',
        ]);

        // B. HANDLE UPLOAD FOTO
        $photoPath = null;
        
        // Cek apakah user sudah punya CV sebelumnya (untuk ambil foto lama jika tidak upload baru)
        $existingCv = Cv::where('user_id', Auth::id())->first();
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('cv_photos', 'public');
        } elseif ($existingCv) {
            $photoPath = $existingCv->photo_path;
        }

        // C. SIMPAN DATA CV UTAMA (UpdateOrCreate)
        // Ini akan membuat CV baru ATAU mengupdate jika user sudah punya CV
        $cv = Cv::updateOrCreate(
            ['user_id' => Auth::id()], // Kondisi pencarian
            [
                'full_name'  => $validated['full_name'],
                'profession' => $validated['profession'],
                'email'      => $validated['email'],
                'phone'      => $validated['phone'],
                'address'    => $validated['address'],
                'summary'    => $validated['summary'],
                'skills'     => $validated['skills'],
                
                // Simpan data pendidikan ke kolom baru
                'university' => $validated['university'],
                'major'      => $validated['major'],
                'gpa'        => $validated['gpa'],

                // Field lama kita kosongkan atau isi string kosong jika database mewajibkan
                'education'  => $validated['university'] . ' - ' . $validated['major'], 
                'experience' => 'Lihat detail pengalaman', // Dummy text karena data asli ada di tabel lain

                'template'   => $validated['template'],
                'photo_path' => $photoPath,
            ]
        );

        // D. SIMPAN PENGALAMAN KERJA (RELASI)
        // Strategi: Hapus semua pengalaman lama milik CV ini, lalu buat ulang dari inputan baru.
        // Ini cara paling aman untuk menangani edit/hapus item list tanpa logika rumit.
        if ($existingCv) {
            $cv->workExperiences()->delete();
        }

        if ($request->has('work_experiences')) {
            foreach ($request->work_experiences as $experience) {
                // Pastikan data tidak kosong sebelum create
                if (!empty($experience['company'])) {
                    WorkExperience::create([
                        'cv_id'       => $cv->id,
                        'company'     => $experience['company'],
                        'position'    => $experience['position'],
                        'start_date'  => $experience['start_date'],
                        'end_date'    => $experience['end_date'] ?? null,
                        'is_current'  => isset($experience['is_current']) ? 1 : 0,
                        'description' => $experience['description'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('dashboard')->with('success', 'CV berhasil disimpan!');
    }

    // 3. Download/Preview PDF
    public function download()
    {
        // Load CV beserta pengalaman kerjanya
        $cv = Cv::with('workExperiences')->where('user_id', Auth::id())->firstOrFail();
        
        // Tentukan view template
        $templateView = 'cv.' . $cv->template; 
        
        // Cek apakah view template ada, jika tidak pakai default
        if (!view()->exists($templateView)) {
            $templateView = 'cv.template';
        }

        $pdf = Pdf::loadView($templateView, compact('cv'));
        
        return $pdf->stream('CV_' . $cv->full_name . '.pdf'); 
    }

    // 4. Edit CV
    public function edit($id)
    {
        $cv = Cv::with('workExperiences')->findOrFail($id);
        
        if ($cv->user_id !== Auth::id()) {
            return abort(403, 'Unauthorized');
        }

        $selectedTemplate = $cv->template;
        return view('cv.edit-cv', compact('cv', 'selectedTemplate'));
    }

    // 5. Update CV (Sebenarnya sudah terhandle di fungsi store pakai updateOrCreate, 
    // tapi jika route update mengarah kesini, kita samakan logikanya)
    public function update($id, Request $request)
    {
        // Kita alihkan ke fungsi store saja agar logikanya satu pintu
        return $this->store($request);
    }

    // 6. Delete CV
    public function destroy($id)
    {
        $cv = Cv::findOrFail($id);
        
        if ($cv->user_id !== Auth::id()) {
            return abort(403, 'Unauthorized');
        }

        $cv->delete(); // Karena pakai cascade on delete di migrasi, work_experiences juga ikut terhapus otomatis

        return redirect()->route('dashboard')->with('success', 'CV berhasil dihapus!');
    }
}