<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat CV - ShowCase U</title>
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
        
        /* KITA PAKAI CSS BIASA SUPAYA PASTI JALAN */
        .input-field { 
            width: 100%;
            padding: 10px 15px; /* Jarak teks di dalam kotak */
            border: 1px solid #cbd5e0; /* Garis pinggir abu-abu JELAS */
            border-radius: 8px; /* Sudut melengkung */
            background-color: #f8fafc; /* Warna latar agak abu muda */
            font-size: 14px;
            color: #2d3748;
            margin-top: 4px;
            transition: all 0.3s ease;
        }
        
        /* Saat diklik jadi Putih bersih & Pinggir Pink */
        .input-field:focus {
            outline: none;
            background-color: #ffffff;
            border-color: #FFB5B6; 
            box-shadow: 0 0 0 3px rgba(255, 181, 182, 0.2); /* Efek glowing tipis */
        }
        
        .input-field::placeholder {
            color: #a0aec0;
        }

        .label-text { 
            display: block;
            font-weight: 600;
            color: #4a5568;
            font-size: 12px;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .drop-zone {
            border: 2px dashed #cbd5e0;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            background-color: #f8fafc;
            transition: background-color 0.3s;
        }
        
        .drop-zone:hover {
            background-color: #ffffff;
            border-color: #FFB5B6;
        }

        .drop-zone.dragover {
            border-color: #FFB5B6;
            background-color: #fff5f5;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen" x-data="cvGenerator()">

    {{-- HEADER BAR --}}
    <div class="bg-white shadow-sm sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="bg-brand-sky p-2 rounded-full hover:bg-brand-peach transition text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h1 class="text-xl font-bold text-gray-800">CV Generator</h1>
            </div>
            
            <div class="flex gap-2 items-center">
                <span class="text-xs text-brand-blue font-semibold bg-brand-sky px-3 py-1 rounded-full">Template: {{ ucfirst(str_replace('_', ' ', $selectedTemplate)) }}</span>
                @if($selectedTemplate === 'template')
                <button @click="showCustomize = !showCustomize" class="bg-brand-peach text-gray-700 px-4 py-2 rounded-full font-bold text-sm hover:bg-orange-200 transition flex items-center gap-2">
                    Customize
                </button>
                @endif
                @if($cv)
                <a href="{{ route('cv.download') }}" target="_blank" class="bg-brand-pink text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-red-300 transition flex items-center gap-2">
                    Download PDF
                </a>
                @endif
            </div>
        </div>
    </div>

    {{-- MAIN LAYOUT: FORM + LIVE PREVIEW --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-2xl mb-6 text-center font-medium">
            ✓ {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-2xl mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- CUSTOMIZE PANEL (MODAL) --}}
        <div x-show="showCustomize" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4" @click="showCustomize = false" style="display: none;">
            <div class="bg-white rounded-2xl max-w-md w-full p-8" @click.stop>
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Customize Colors</h3>
                    <button @click="showCustomize = false" class="text-gray-400 hover:text-gray-600">✕</button>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="label-text">Header Color</label>
                        <div class="flex gap-2 items-center"><input type="color" x-model="headerColor" class="w-12 h-10 rounded"><input type="text" x-model="headerColor" class="input-field"></div>
                    </div>
                    <div>
                        <label class="label-text">Text Color</label>
                        <div class="flex gap-2 items-center"><input type="color" x-model="textColor" class="w-12 h-10 rounded"><input type="text" x-model="textColor" class="input-field"></div>
                    </div>
                    <button @click="showCustomize = false" class="w-full bg-brand-pink text-white font-bold py-2 rounded-lg mt-6">Done</button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 h-[calc(100vh-200px)]">
            
            {{-- LEFT SIDE: FORM INPUT --}}
            <div class="bg-white rounded-[30px] shadow-lg p-8 overflow-y-auto">
                <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="template" value="{{ $selectedTemplate ?? 'template' }}">

                    {{-- 1. FOTO PROFIL --}}
                    <div class="mb-8">
                        <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest mb-4 border-b border-gray-100 pb-2">📸 Foto Profil</h3>
                        <div class="flex items-center gap-4">
                            <div class="w-20 h-20 rounded-full bg-gray-100 overflow-hidden border border-gray-200 flex-shrink-0">
                                <template x-if="photoPreview">
                                    <img :src="photoPreview" class="w-full h-full object-cover">
                                </template>
                                <template x-if="!photoPreview">
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">No Photo</div>
                                </template>
                            </div>
                            <div class="flex-1">
                                <input type="file" name="photo" @change="handlePhotoSelect($event)" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:bg-brand-sky file:text-brand-blue hover:file:bg-brand-peach">
                            </div>
                        </div>
                    </div>

                    {{-- 2. DATA PRIBADI --}}
                    <div class="mb-8 space-y-4">
                        <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest mb-4 border-b border-gray-100 pb-2">Data Diri</h3>
                        <div><label class="label-text">Nama Lengkap</label><input type="text" name="full_name" x-model="fullName" class="input-field" required></div>
                        <div><label class="label-text">Profesi</label><input type="text" name="profession" x-model="profession" class="input-field" required></div>
                        <div class="grid grid-cols-2 gap-4">
                            <div><label class="label-text">Email</label><input type="email" name="email" x-model="email" class="input-field" required></div>
                            <div><label class="label-text">Telepon</label><input type="text" name="phone" x-model="phone" class="input-field" required></div>
                        </div>
                        <div><label class="label-text">Alamat</label><input type="text" name="address" x-model="address" class="input-field" required></div>
                        <div><label class="label-text">Tentang Saya (Summary)</label><textarea name="summary" rows="3" x-model="summary" class="input-field" required></textarea></div>
                    </div>

                    {{-- 3. PENDIDIKAN (BARU: SESUAI DATABASE) --}}
                    <div class="mb-8 space-y-4">
                        <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest mb-4 border-b border-gray-100 pb-2">🎓 Pendidikan Terakhir</h3>
                        <div>
                            <label class="label-text">Nama Universitas / Sekolah</label>
                            <input type="text" name="university" x-model="university" class="input-field" placeholder="Contoh: Universitas Indonesia" required>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="label-text">Jurusan</label>
                                <input type="text" name="major" x-model="major" class="input-field" placeholder="Informatika" required>
                            </div>
                            <div>
                                <label class="label-text">IPK (GPA)</label>
                                <input type="text" name="gpa" x-model="gpa" class="input-field" placeholder="3.85">
                            </div>
                        </div>
                    </div>

                    {{-- 4. PENGALAMAN KERJA (BARU: DINAMIS & LOOP) --}}
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4 border-b border-gray-100 pb-2">
                            <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest">💼 Pengalaman Kerja</h3>
                            <button type="button" @click="addExperience()" class="text-xs bg-brand-sky text-brand-blue px-3 py-1 rounded hover:bg-brand-peach hover:text-white transition">+ Tambah</button>
                        </div>
                        
                        <div class="space-y-6">
                            <template x-for="(exp, index) in experiences" :key="index">
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 relative">
                                    <button type="button" @click="removeExperience(index)" class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">✕</button>
                                    
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label class="label-text">Perusahaan</label>
                                            <input type="text" :name="`work_experiences[${index}][company]`" x-model="exp.company" class="input-field bg-transparent" placeholder="Nama PT" required>
                                        </div>
                                        <div>
                                            <label class="label-text">Posisi</label>
                                            <input type="text" :name="`work_experiences[${index}][position]`" x-model="exp.position" class="input-field bg-transparent" placeholder="Jabatan" required>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label class="label-text">Mulai</label>
                                            <input type="date" :name="`work_experiences[${index}][start_date]`" x-model="exp.start_date" class="input-field bg-transparent" required>
                                        </div>
                                        <div>
                                            <label class="label-text">Selesai</label>
                                            <input type="date" :name="`work_experiences[${index}][end_date]`" x-model="exp.end_date" class="input-field bg-transparent">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="label-text">Deskripsi</label>
                                        <textarea :name="`work_experiences[${index}][description]`" x-model="exp.description" rows="2" class="input-field bg-transparent" placeholder="Apa yang kamu kerjakan?"></textarea>
                                    </div>
                                </div>
                            </template>
                            <div x-show="experiences.length === 0" class="text-center text-gray-400 text-xs py-4 italic">Belum ada pengalaman kerja.</div>
                        </div>
                    </div>

                    {{-- 5. SKILLS --}}
                    <div class="mb-8">
                        <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest mb-4 border-b border-gray-100 pb-2">🛠 Keahlian</h3>
                        <label class="label-text">Daftar Keahlian (Pisahkan dengan koma)</label>
                        <textarea name="skills" rows="3" x-model="skills" class="input-field" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-brand-pink text-white font-bold py-3 rounded-2xl hover:bg-red-300 transition shadow-lg shadow-pink-200">
                        💾 Simpan Data CV
                    </button>
                </form>
            </div>

            {{-- RIGHT SIDE: LIVE PREVIEW --}}
            <div class="bg-white rounded-[30px] shadow-lg p-6 flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-gray-800 flex items-center gap-2"><span class="bg-brand-sky p-2 rounded-lg">👁️</span> Live Preview</h2>
                </div>

                <div class="flex-1 bg-gray-100 rounded-xl overflow-hidden border-2 border-dashed border-gray-300 flex items-center justify-center overflow-y-auto">
                    <div class="bg-white shadow-xl origin-top transform scale-75" style="width: 210mm; min-height: 297mm; padding: 0;">
                        
                        {{-- TEMPLATE: MODERN --}}
                        <div x-show="selectedTemplate === 'template'">
                            <div :style="`background: linear-gradient(135deg, ${headerColor} 0%, ${accentColor} 100%);`" class="p-8 flex items-center gap-6 text-white">
                                <div class="w-24 h-24 rounded-full bg-white border-4 border-white overflow-hidden flex-shrink-0 flex items-center justify-center">
                                    <template x-if="photoPreview"><img :src="photoPreview" class="w-full h-full object-cover"></template>
                                    <template x-if="!photoPreview"><span class="text-gray-300 text-3xl font-bold" x-text="fullName ? fullName.charAt(0) : 'A'"></span></template>
                                </div>
                                <div>
                                    <h1 class="text-3xl font-bold" :style="`color: ${headerTextColor}`" x-text="fullName || 'Nama Anda'"></h1>
                                    <p class="text-lg opacity-90" :style="`color: ${headerTextColor}`" x-text="profession || 'Profesi Anda'"></p>
                                    <div class="flex gap-4 text-xs mt-2 opacity-80" :style="`color: ${headerTextColor}`">
                                        <span x-text="email"></span> | <span x-text="phone"></span> | <span x-text="address"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-8 space-y-6">
                                <div>
                                    <h3 class="font-bold uppercase tracking-widest mb-2 border-b-2 pb-1" :style="`color: ${textColor}; border-color: ${headerColor}`">Profile</h3>
                                    <p class="text-sm text-gray-600" x-text="summary"></p>
                                </div>
                                
                                {{-- Preview Pendidikan --}}
                                <div>
                                    <h3 class="font-bold uppercase tracking-widest mb-2 border-b-2 pb-1" :style="`color: ${textColor}; border-color: ${headerColor}`">Education</h3>
                                    <div class="mb-2">
                                        <p class="font-bold text-gray-800" x-text="university || 'Nama Universitas'"></p>
                                        <p class="text-sm text-gray-600"><span x-text="major"></span> <span x-show="gpa">| GPA: <span x-text="gpa"></span></span></p>
                                    </div>
                                </div>

                                {{-- Preview Experience (Looping) --}}
                                <div>
                                    <h3 class="font-bold uppercase tracking-widest mb-2 border-b-2 pb-1" :style="`color: ${textColor}; border-color: ${headerColor}`">Experience</h3>
                                    <template x-for="exp in experiences">
                                        <div class="mb-4">
                                            <div class="flex justify-between">
                                                <p class="font-bold text-gray-800" x-text="exp.position || 'Posisi'"></p>
                                                <p class="text-xs text-gray-500"><span x-text="exp.start_date"></span> - <span x-text="exp.end_date || 'Present'"></span></p>
                                            </div>
                                            <p class="text-sm text-gray-700 font-semibold" x-text="exp.company || 'Perusahaan'"></p>
                                            <p class="text-xs text-gray-600 mt-1" x-text="exp.description"></p>
                                        </div>
                                    </template>
                                </div>

                                <div>
                                    <h3 class="font-bold uppercase tracking-widest mb-2 border-b-2 pb-1" :style="`color: ${textColor}; border-color: ${headerColor}`">Skills</h3>
                                    <p class="text-sm text-gray-600" x-text="skills"></p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- TEMPLATE: ATS (Simple) --}}
                        <div x-show="selectedTemplate === 'ats_template'" class="p-10 font-serif text-gray-900">
                            <div class="text-center border-b-2 border-gray-800 pb-4 mb-4">
                                <h1 class="text-3xl font-bold uppercase" x-text="fullName"></h1>
                                <p class="text-sm mt-1" x-text="profession"></p>
                                <p class="text-xs mt-1"><span x-text="email"></span> • <span x-text="phone"></span> • <span x-text="address"></span></p>
                            </div>
                            
                            <div class="mb-6">
                                <h3 class="font-bold border-b border-gray-400 mb-2">SUMMARY</h3>
                                <p class="text-sm" x-text="summary"></p>
                            </div>

                            <div class="mb-6">
                                <h3 class="font-bold border-b border-gray-400 mb-2">EDUCATION</h3>
                                <div class="flex justify-between">
                                    <p class="font-bold text-sm" x-text="university"></p>
                                    <p class="text-sm" x-show="gpa">GPA: <span x-text="gpa"></span></p>
                                </div>
                                <p class="text-sm italic" x-text="major"></p>
                            </div>

                            <div class="mb-6">
                                <h3 class="font-bold border-b border-gray-400 mb-2">EXPERIENCE</h3>
                                <template x-for="exp in experiences">
                                    <div class="mb-3">
                                        <div class="flex justify-between">
                                            <p class="font-bold text-sm" x-text="exp.company"></p>
                                            <p class="text-xs"><span x-text="exp.start_date"></span> - <span x-text="exp.end_date"></span></p>
                                        </div>
                                        <p class="text-sm italic" x-text="exp.position"></p>
                                        <p class="text-xs mt-1" x-text="exp.description"></p>
                                    </div>
                                </template>
                            </div>

                            <div>
                                <h3 class="font-bold border-b border-gray-400 mb-2">SKILLS</h3>
                                <p class="text-sm" x-text="skills"></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
    function cvGenerator() {
        // 1. KITA SIAPKAN DATANYA DALAM SATU PAKET PHP
        // Abaikan jika VS Code memberi garis merah di baris ini, itu normal.
        const cvData = {!! json_encode([
            'fullName'   => old('full_name', $cv?->full_name ?? auth()->user()?->name ?? ''),
            'profession' => old('profession', $cv?->profession ?? ''),
            'email'      => old('email', $cv?->email ?? auth()->user()?->email ?? ''),
            'phone'      => old('phone', $cv?->phone ?? ''),
            'address'    => old('address', $cv?->address ?? ''),
            'summary'    => old('summary', $cv?->summary ?? ''),
            'skills'     => old('skills', $cv?->skills ?? ''),
            
            // Data Baru (Univ & IPK)
            'university' => old('university', $cv?->university ?? ''),
            'major'      => old('major', $cv?->major ?? ''),
            'gpa'        => old('gpa', $cv?->gpa ?? ''),
            
            // Pengalaman Kerja (Pastikan array kosong jika null)
            'experiences'=> $cv && $cv->workExperiences ? $cv->workExperiences : []
        ]) !!};

        // 2. KEMBALIKAN OBJECT ALPHINE JS
        return {
            // Ambil semua data dari paket di atas
            fullName: cvData.fullName,
            profession: cvData.profession,
            email: cvData.email,
            phone: cvData.phone,
            address: cvData.address,
            summary: cvData.summary,
            skills: cvData.skills,
            university: cvData.university,
            major: cvData.major,
            gpa: cvData.gpa,
            experiences: cvData.experiences,

            showCustomize: false,
            
            // Foto Preview (Logika Blade sederhana, aman)
            photoPreview: @if($cv && $cv->photo_path) '{{ asset("storage/" . $cv->photo_path) }}' @else null @endif,
            
            selectedTemplate: '{{ $selectedTemplate ?? "template" }}',

            // Warna Tampilan Default
            headerColor: '#FFB5B6',
            headerTextColor: '#FFFFFF',
            accentColor: '#FFE5D9',
            textColor: '#2c3e50',
            sectionBorderColor: '#FFB5B6',

            // Fungsi Handle Upload Foto
            handlePhotoSelect(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => { this.photoPreview = e.target.result; };
                    reader.readAsDataURL(file);
                }
            },

            // Fungsi Tambah Pengalaman Kerja
            addExperience() {
                this.experiences.push({
                    company: '',
                    position: '',
                    start_date: '',
                    end_date: '',
                    description: ''
                });
            },
            
            // Fungsi Hapus Pengalaman Kerja
            removeExperience(index) {
                this.experiences.splice(index, 1);
            }
        }
    }
</script>  
</body>
</html>