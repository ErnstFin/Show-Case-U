<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat CV - ShowCase U</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-pink': '#FFB5B6', 'brand-peach': '#FFE5D9',
                        'brand-white': '#FFFFFF', 'brand-sky': '#D6EBF2', 'brand-blue': '#A3C4D9',
                    },
                    fontFamily: { 'poppins': ['Poppins', 'sans-serif'] }
                }
            }
        }
    </script>
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-brand-sky min-h-screen py-10 px-4">

    <div class="max-w-5xl mx-auto mb-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="bg-white p-2 rounded-full shadow-sm hover:bg-brand-peach transition text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-700">CV Generator</h1>
        </div>
        
        @if($cv)
        <a href="{{ route('cv.download') }}" class="bg-brand-pink text-white px-6 py-2 rounded-full font-bold shadow-lg shadow-pink-200 hover:bg-red-300 transition flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12" />
            </svg>
            Download PDF
        </a>
        @endif
    </div>

    <div class="bg-white w-full max-w-5xl mx-auto rounded-[35px] shadow-xl overflow-hidden relative border border-white">
        
        <div class="bg-brand-peach px-8 py-6">
            <h2 class="text-gray-800 font-bold text-xl">Lengkapi Data Diri</h2>
            <p class="text-xs text-gray-500">Data ini akan disusun otomatis menjadi CV profesional.</p>
        </div>

        <div class="p-8 md:p-10">
            @if(session('success'))
                <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-2xl mb-6 text-center font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('cv.store') }}" method="POST">
                @csrf
                
                <h3 class="text-brand-blue font-bold uppercase tracking-wide text-sm mb-4 border-b border-gray-100 pb-2">Informasi Kontak</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="label-text">Nama Lengkap</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $cv->full_name ?? Auth::user()->name) }}" class="input-field" placeholder="Nama Lengkap">
                    </div>
                    <div>
                        <label class="label-text">Profesi / Posisi</label>
                        <input type="text" name="profession" value="{{ old('profession', $cv->profession ?? '') }}" class="input-field" placeholder="Contoh: UI/UX Designer">
                    </div>
                    <div>
                        <label class="label-text">Email</label>
                        <input type="email" name="email" value="{{ old('email', $cv->email ?? Auth::user()->email) }}" class="input-field">
                    </div>
                    <div>
                        <label class="label-text">No. Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $cv->phone ?? '') }}" class="input-field" placeholder="0812...">
                    </div>
                    <div class="md:col-span-2">
                        <label class="label-text">Alamat Domisili</label>
                        <input type="text" name="address" value="{{ old('address', $cv->address ?? '') }}" class="input-field" placeholder="Kota, Negara">
                    </div>
                    <div class="md:col-span-2">
                        <label class="label-text">Tentang Saya (Summary)</label>
                        <textarea name="summary" rows="3" class="input-field" placeholder="Deskripsikan diri kamu secara singkat...">{{ old('summary', $cv->summary ?? '') }}</textarea>
                    </div>
                </div>

                <h3 class="text-brand-blue font-bold uppercase tracking-wide text-sm mb-4 border-b border-gray-100 pb-2">Kualifikasi</h3>
                <div class="space-y-6">
                    <div>
                        <label class="label-text">Keahlian (Skills)</label>
                        <p class="text-[10px] text-gray-400 mb-1">Pisahkan dengan koma (contoh: Photoshop, Laravel, Public Speaking)</p>
                        <input type="text" name="skills" value="{{ old('skills', $cv->skills ?? '') }}" class="input-field">
                    </div>

                    <div>
                        <label class="label-text">Riwayat Pendidikan</label>
                        <textarea name="education" rows="4" class="input-field" placeholder="Contoh:&#10;2018 - 2022 : Sarjana Komputer, Univ. Indonesia&#10;2015 - 2018 : SMA Negeri 1 Jakarta">{{ old('education', $cv->education ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="label-text">Pengalaman Kerja</label>
                        <textarea name="experience" rows="5" class="input-field" placeholder="Contoh:&#10;2023 - Sekarang : Junior Designer di Tokopedia&#10;- Membuat desain UI aplikasi mobile&#10;- Berkolaborasi dengan tim developer">{{ old('experience', $cv->experience ?? '') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-brand-pink text-white font-bold py-4 px-10 rounded-2xl shadow-lg shadow-pink-200 hover:bg-red-300 transition transform hover:-translate-y-1 w-full md:w-auto">
                        Simpan Data CV
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .label-text { display: block; font-size: 0.75rem; font-weight: 700; color: #9CA3AF; text-transform: uppercase; margin-bottom: 0.5rem; }
        .input-field { width: 100%; background-color: #F9FAFB; border: 1px solid #F3F4F6; border-radius: 1rem; padding: 0.75rem 1.25rem; outline: none; transition: all; }
        .input-field:focus { box-shadow: 0 0 0 2px #FFB5B6; background-color: white; }
    </style>

</body>
</html>