<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit CV - ShowCase U</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
    <style> 
        body { font-family: 'Poppins', sans-serif; }
        
        .input-field { 
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            background-color: #f8fafc;
            font-size: 14px;
            color: #2d3748;
            margin-top: 4px;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            outline: none;
            background-color: #ffffff;
            border-color: #FFB5B6; 
            box-shadow: 0 0 0 3px rgba(255, 181, 182, 0.2);
        }
        
        .label-text { 
            display: block; font-weight: 600; color: #4a5568; font-size: 12px;
            margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen" x-data="cvGenerator()">

    {{-- HEADER --}}
    <div class="bg-white shadow-sm sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">Edit CV</h1>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-700">Kembali ke Dashboard</a>
        </div>
    </div>

    {{-- MAIN FORM --}}
    <div class="max-w-4xl mx-auto px-4 py-8">
        
        @if($errors->any())
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="bg-white rounded-[30px] shadow-lg p-8">
            <form action="{{ route('cv.update', $cv->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <input type="hidden" name="template" value="{{ $selectedTemplate ?? 'template' }}">

                {{-- FOTO --}}
                <div class="mb-8 flex items-center gap-6">
                    <div class="w-24 h-24 rounded-full bg-gray-100 overflow-hidden border border-gray-200">
                        <template x-if="photoPreview"><img :src="photoPreview" class="w-full h-full object-cover"></template>
                        <template x-if="!photoPreview"><div class="w-full h-full flex items-center justify-center text-xs text-gray-400">No Photo</div></template>
                    </div>
                    <div>
                        <label class="label-text">Ganti Foto Profil</label>
                        <input type="file" name="photo" @change="handlePhotoSelect($event)" class="text-sm">
                    </div>
                </div>

                {{-- DATA DIRI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div><label class="label-text">Nama Lengkap</label><input type="text" name="full_name" x-model="fullName" class="input-field"></div>
                    <div><label class="label-text">Profesi</label><input type="text" name="profession" x-model="profession" class="input-field"></div>
                    <div><label class="label-text">Email</label><input type="email" name="email" x-model="email" class="input-field"></div>
                    <div><label class="label-text">Telepon</label><input type="text" name="phone" x-model="phone" class="input-field"></div>
                </div>
                
                <div class="mb-6">
                    <label class="label-text">Alamat</label>
                    <input type="text" name="address" x-model="address" class="input-field">
                </div>

                <div class="mb-6">
                    <label class="label-text">Tentang Saya</label>
                    <textarea name="summary" rows="3" x-model="summary" class="input-field"></textarea>
                </div>

                {{-- PENDIDIKAN (INI YANG TADI HILANG) --}}
                <div class="mb-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <h3 class="font-bold text-gray-700 mb-4">🎓 Pendidikan</h3>
                    <div class="mb-4">
                        <label class="label-text">Nama Universitas</label>
                        <input type="text" name="university" x-model="university" class="input-field" placeholder="Universitas Indonesia">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="label-text">Jurusan</label>
                            <input type="text" name="major" x-model="major" class="input-field" placeholder="Informatika">
                        </div>
                        <div>
                            <label class="label-text">IPK</label>
                            <input type="text" name="gpa" x-model="gpa" class="input-field" placeholder="3.85">
                        </div>
                    </div>
                </div>

                {{-- PENGALAMAN KERJA --}}
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-gray-700">💼 Pengalaman Kerja</h3>
                        <button type="button" @click="addExperience()" class="text-xs bg-brand-sky px-3 py-1 rounded hover:bg-brand-blue transition">+ Tambah</button>
                    </div>
                    
                    <div class="space-y-4">
                        <template x-for="(exp, index) in experiences" :key="index">
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 relative">
                                <button type="button" @click="removeExperience(index)" class="absolute top-2 right-2 text-red-500 font-bold">✕</button>
                                <div class="grid grid-cols-2 gap-3 mb-2">
                                    <input type="text" :name="`work_experiences[${index}][company]`" x-model="exp.company" class="input-field" placeholder="Perusahaan">
                                    <input type="text" :name="`work_experiences[${index}][position]`" x-model="exp.position" class="input-field" placeholder="Posisi">
                                </div>
                                <div class="grid grid-cols-2 gap-3 mb-2">
                                    <input type="date" :name="`work_experiences[${index}][start_date]`" x-model="exp.start_date" class="input-field">
                                    <input type="date" :name="`work_experiences[${index}][end_date]`" x-model="exp.end_date" class="input-field">
                                </div>
                                <textarea :name="`work_experiences[${index}][description]`" x-model="exp.description" rows="2" class="input-field" placeholder="Deskripsi"></textarea>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- SKILLS --}}
                <div class="mb-8">
                    <label class="label-text">Skills</label>
                    <textarea name="skills" rows="2" x-model="skills" class="input-field"></textarea>
                </div>

                <button type="submit" class="w-full bg-brand-pink text-white font-bold py-3 rounded-2xl hover:bg-red-300 transition shadow-lg">
                    💾 Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>
        function cvGenerator() {
            const cvData = {!! json_encode([
                'fullName'   => old('full_name', $cv->full_name),
                'profession' => old('profession', $cv->profession),
                'email'      => old('email', $cv->email),
                'phone'      => old('phone', $cv->phone),
                'address'    => old('address', $cv->address),
                'summary'    => old('summary', $cv->summary),
                'skills'     => old('skills', $cv->skills),
                'university' => old('university', $cv->university),
                'major'      => old('major', $cv->major),
                'gpa'        => old('gpa', $cv->gpa),
                'experiences'=> $cv->workExperiences
            ]) !!};

            return {
                ...cvData,
                photoPreview: @if($cv->photo_path) '{{ asset("storage/" . $cv->photo_path) }}' @else null @endif,
                
                handlePhotoSelect(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => { this.photoPreview = e.target.result; };
                        reader.readAsDataURL(file);
                    }
                },
                addExperience() {
                    this.experiences.push({ company: '', position: '', start_date: '', end_date: '', description: '' });
                },
                removeExperience(index) {
                    this.experiences.splice(index, 1);
                }
            }
        }
    </script>
</body>
</html>