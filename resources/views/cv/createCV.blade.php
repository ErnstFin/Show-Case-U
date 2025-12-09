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
        .input-field { 
            @apply w-full px-0 py-2 border-b border-gray-300 rounded-none focus:outline-none focus:border-brand-pink transition text-sm bg-white;
            color: #4A5568;
        }
        .input-field:focus {
            background-color: white;
            border-bottom-width: 2px;
        }
        .input-field::placeholder {
            color: #CBD5E0;
        }
        .label-text { 
            @apply block font-normal text-gray-600 text-xs mb-2 uppercase tracking-wide;
        }
        .drop-zone {
            @apply border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center cursor-pointer transition;
        }
        .drop-zone.dragover {
            @apply border-brand-pink bg-brand-peach bg-opacity-20;
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m6 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 2a2 2 0 100 4m0-4a2 2 0 110 4M7 20h10a2 2 0 002-2V8a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Customize
                </button>
                @endif
                @if($cv)
                <a href="{{ route('cv.download') }}" target="_blank" class="bg-brand-pink text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-red-300 transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
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

        {{-- CUSTOMIZE PANEL (MODAL) --}}
        <div x-show="showCustomize" x-transition class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4" @click="showCustomize = false">
            <div class="bg-white rounded-2xl max-w-md w-full p-8" @click.stop>
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Customize Template</h3>
                    <button @click="showCustomize = false" class="text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="label-text">Header Color</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" x-model="headerColor" class="w-12 h-10 rounded cursor-pointer border border-gray-300">
                            <input type="text" x-model="headerColor" class="input-field flex-1 text-xs" placeholder="#FFB5B6">
                        </div>
                    </div>

                    <div>
                        <label class="label-text">Header Text Color</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" x-model="headerTextColor" class="w-12 h-10 rounded cursor-pointer border border-gray-300">
                            <input type="text" x-model="headerTextColor" class="input-field flex-1 text-xs" placeholder="#FFFFFF">
                        </div>
                    </div>

                    <div>
                        <label class="label-text">Accent Color</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" x-model="accentColor" class="w-12 h-10 rounded cursor-pointer border border-gray-300">
                            <input type="text" x-model="accentColor" class="input-field flex-1 text-xs" placeholder="#FFE5D9">
                        </div>
                    </div>

                    <div>
                        <label class="label-text">Section Border Color</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" x-model="sectionBorderColor" class="w-12 h-10 rounded cursor-pointer border border-gray-300">
                            <input type="text" x-model="sectionBorderColor" class="input-field flex-1 text-xs" placeholder="#FFB5B6">
                        </div>
                    </div>

                    <div>
                        <label class="label-text">Text Color</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" x-model="textColor" class="w-12 h-10 rounded cursor-pointer border border-gray-300">
                            <input type="text" x-model="textColor" class="input-field flex-1 text-xs" placeholder="#2c3e50">
                        </div>
                    </div>

                    <button @click="showCustomize = false" class="w-full bg-brand-pink text-white font-bold py-2 rounded-lg hover:bg-red-300 transition mt-6">
                        Done
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 h-[calc(100vh-200px)]">
            
            {{-- LEFT SIDE: FORM INPUT --}}
            <div class="bg-white rounded-[30px] shadow-lg p-8 overflow-y-auto">
                <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="bg-brand-peach p-2 rounded-lg">📝</span>
                    Lengkapi Data Diri
                </h2>

                <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data" @submit="onFormSubmit($event)">
                    @csrf
                    <input type="hidden" name="template" value="{{ $selectedTemplate ?? 'template' }}">

                    {{-- SECTION: FOTO PROFIL --}}
                    <div class="mb-8">
                        <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest mb-4 border-b border-gray-100 pb-2">📸 Foto Profil</h3>
                        
                        <div class="mb-4">
                            <label class="label-text">Tambahkan Foto (Opsional)</label>
                            <p class="text-[10px] text-gray-400 mb-3">Format: PNG, JPEG, JPG, GIF | Max 5MB</p>
                            
                            {{-- Photo Preview --}}
                            <div x-show="!photoPreview && !$el.querySelector('input[name=photo]').value" class="mb-4">
                                <div class="w-20 h-20 rounded-full bg-brand-peach flex items-center justify-center text-3xl font-bold text-brand-pink">
                                    <span x-text="(fullName || 'A').charAt(0).toUpperCase()"></span>
                                </div>
                            </div>
                            <div x-show="photoPreview" class="mb-4">
                                <img :src="photoPreview" alt="Preview" class="w-20 h-20 rounded-full object-cover border-4 border-brand-pink">
                                <button type="button" @click="removePhoto()" class="text-xs text-red-500 hover:text-red-700 mt-2 font-bold">
                                    ✕ Hapus Foto
                                </button>
                            </div>

                            {{-- Drag & Drop Zone --}}
                            <div class="drop-zone" @dragover="dragover = true" @dragleave="dragover = false" @drop="handleDrop($event)" :class="dragover ? 'dragover' : ''">
                                <div class="flex flex-col items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <p class="text-sm text-gray-600 font-semibold">Drag & Drop foto di sini</p>
                                    <p class="text-xs text-gray-400">atau</p>
                                </div>
                                <input type="file" name="photo" accept="image/*" class="hidden" @change="handlePhotoSelect($event)" x-ref="photoInput">
                                <button type="button" @click="$refs.photoInput.click()" class="text-xs text-brand-pink font-bold hover:underline mt-2">
                                    Pilih dari Komputer
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 1: INFORMASI KONTAK --}}
                    <div class="mb-8">
                        <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest mb-4 border-b border-gray-100 pb-2">Informasi Kontak</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="label-text">Nama Lengkap</label>
                                <input type="text" name="full_name" value="{{ old('full_name', $cv->full_name ?? auth()->user()?->name ?? '') }}" class="input-field" placeholder="John Doe" @input="updatePreview" required>
                                @error('full_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="label-text">Profesi</label>
                                <input type="text" name="profession" value="{{ old('profession', $cv->profession ?? '') }}" class="input-field" placeholder="Software Engineer" @input="updatePreview" required>
                                @error('profession') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-text">Email</label>
                                <input type="email" name="email" value="{{ old('email', $cv->email ?? auth()->user()?->email ?? '') }}" class="input-field" @input="updatePreview" required>
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-text">Telepon</label>
                                <input type="text" name="phone" value="{{ old('phone', $cv->phone ?? '') }}" class="input-field" placeholder="0812..." @input="updatePreview" required>
                                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="label-text">Kota/Negara</label>
                                <input type="text" name="address" value="{{ old('address', $cv->address ?? '') }}" class="input-field" placeholder="Jakarta, Indonesia" @input="updatePreview" required>
                                @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-text">Tentang Saya</label>
                                <textarea name="summary" rows="3" class="input-field" placeholder="Deskripsikan diri kamu..." @input="updatePreview" required>{{ old('summary', $cv->summary ?? '') }}</textarea>
                                @error('summary') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 2: KUALIFIKASI --}}
                    <div class="mb-8">
                        <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest mb-4 border-b border-gray-100 pb-2">Kualifikasi</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="label-text">Keahlian (Skills)</label>
                                <p class="text-[10px] text-gray-400 mb-1">Pisahkan dengan koma</p>
                                <textarea name="skills" rows="2" class="input-field" @input="updatePreview" required>{{ old('skills', $cv->skills ?? '') }}</textarea>
                                @error('skills') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-text">Riwayat Pendidikan</label>
                                <p class="text-[10px] text-gray-400 mb-1">Pisahkan setiap pendidikan dengan baris kosong</p>
                                <textarea name="education" rows="4" class="input-field" @input="updatePreview" required>{{ old('education', $cv->education ?? '') }}</textarea>
                                @error('education') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-text">Pengalaman Kerja</label>
                                <p class="text-[10px] text-gray-400 mb-1">Pisahkan setiap pengalaman dengan baris kosong</p>
                                <textarea name="experience" rows="5" class="input-field" @input="updatePreview" required>{{ old('experience', $cv->experience ?? '') }}</textarea>
                                @error('experience') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- SUBMIT BUTTON --}}
                    <button type="submit" class="w-full bg-brand-pink text-white font-bold py-3 rounded-2xl hover:bg-red-300 transition shadow-lg shadow-pink-200">
                        💾 Simpan Data CV
                    </button>
                </form>
            </div>

            {{-- RIGHT SIDE: LIVE PREVIEW --}}
            <div class="bg-white rounded-[30px] shadow-lg p-6 flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="bg-brand-sky p-2 rounded-lg">👁️</span>
                        Live Preview
                    </h2>
                    <div class="flex gap-1">
                        <button @click="zoomLevel = 75" :class="zoomLevel === 75 ? 'bg-brand-pink text-white' : 'bg-gray-200'" class="px-2 py-1 rounded text-xs font-bold transition">75%</button>
                        <button @click="zoomLevel = 100" :class="zoomLevel === 100 ? 'bg-brand-pink text-white' : 'bg-gray-200'" class="px-2 py-1 rounded text-xs font-bold transition">100%</button>
                    </div>
                </div>

                <div class="flex-1 bg-gray-100 rounded-xl overflow-hidden border-2 border-dashed border-gray-300 flex items-center justify-center" style="overflow-y: auto;">
                    <div :style="`transform: scale(${zoomLevel / 100}); transform-origin: top center;`" class="bg-white" style="width: 8.5in; min-height: 11in;">
                        {{-- PREVIEW MODERN TEMPLATE --}}
                        <div x-show="selectedTemplate === 'template'">
                            <div :style="`background: linear-gradient(135deg, ${headerColor} 0%, ${accentColor} 100%); padding: 30px 35px; display: flex; gap: 25px; align-items: flex-start; border-bottom: 3px solid ${sectionBorderColor};`">
                                <div style="width: 90px; height: 90px; border-radius: 50%; background: white; border: 3px solid white; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 40px; font-weight: 700; overflow: hidden;" :style="`color: ${headerColor};`">
                                    <img x-show="photoPreview" :src="photoPreview" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                    <span x-show="!photoPreview" x-text="(fullName || 'A').charAt(0).toUpperCase()"></span>
                                </div>
                                <div>
                                    <h1 style="font-size: 28px; font-weight: 700; margin: 0; line-height: 1.2;" :style="`color: ${textColor};`" x-text="fullName || 'Your Name'"></h1>
                                    <div style="font-size: 14px; margin-top: 3px; font-weight: 500;" :style="`color: ${textColor};`" x-text="profession || 'Your Profession'"></div>
                                    <div style="font-size: 11px; margin-top: 10px; line-height: 1.4;" :style="`color: ${textColor};`" x-html="formatContactInfo()"></div>
                                </div>
                            </div>

                            <div style="padding: 30px 35px;">
                                <div x-show="summary">
                                    <h2 style="font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; padding-left: 12px; margin-top: 0; margin-bottom: 12px;" :style="`color: ${textColor}; border-left: 4px solid ${sectionBorderColor};`">Professional Summary</h2>
                                    <p style="font-size: 12px; line-height: 1.6;" :style="`color: ${textColor};`" x-text="summary"></p>
                                </div>

                                <div x-show="skills">
                                    <h2 style="font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; padding-left: 12px; margin-top: 20px; margin-bottom: 12px;" :style="`color: ${textColor}; border-left: 4px solid ${sectionBorderColor};`">Technical Skills</h2>
                                    <p style="font-size: 11px; line-height: 1.6;" :style="`color: ${textColor};`" x-text="skills"></p>
                                </div>
                            </div>
                        </div>

                        {{-- PREVIEW ATS TEMPLATE --}}
                        <div x-show="selectedTemplate === 'ats_template'" style="padding: 35px; font-family: Arial, sans-serif;">
                            <div style="margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold; margin: 0; color: #333;" x-text="fullName || 'Your Name'"></h1>
                                <p style="font-size: 13px; color: #666; margin: 5px 0;" x-text="profession || 'Your Profession'"></p>
                                <p style="font-size: 12px; color: #666; margin: 5px 0;" x-html="formatContactInfo()"></p>
                            </div>

                            <div x-show="summary" style="margin-bottom: 15px;">
                                <h2 style="font-size: 13px; font-weight: bold; margin-bottom: 8px; color: #333; border-bottom: 1px solid #000;">PROFESSIONAL SUMMARY</h2>
                                <p style="font-size: 12px; line-height: 1.5; color: #555;" x-text="summary"></p>
                            </div>

                            <div x-show="skills" style="margin-bottom: 15px;">
                                <h2 style="font-size: 13px; font-weight: bold; margin-bottom: 8px; color: #333; border-bottom: 1px solid #000;">TECHNICAL SKILLS</h2>
                                <p style="font-size: 12px; line-height: 1.5; color: #555;" x-text="skills"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function cvGenerator() {
            return {
                zoomLevel: 100,
                dragover: false,
                showCustomize: false,
                photoPreview: @if($cv && $cv->photo_path) '{{ asset("storage/" . $cv->photo_path) }}' @else null @endif,
                selectedTemplate: '{{ $selectedTemplate ?? "template" }}',
                fullName: '{{ old("full_name", $cv->full_name ?? auth()->user()?->name ?? "") }}',
                profession: '{{ old("profession", $cv->profession ?? "") }}',
                email: '{{ old("email", $cv->email ?? auth()->user()?->email ?? "") }}',
                phone: '{{ old("phone", $cv->phone ?? "") }}',
                address: '{{ old("address", $cv->address ?? "") }}',
                summary: `{{ old("summary", $cv->summary ?? "") }}`.replace(/\n/g, ' '),
                skills: '{{ old("skills", $cv->skills ?? "") }}',
                
                // Customize Colors
                headerColor: '#FFB5B6',
                headerTextColor: '#FFFFFF',
                accentColor: '#FFE5D9',
                textColor: '#2c3e50',
                sectionBorderColor: '#FFB5B6',
                updatePreview(event) {
                    if (event.target.name === 'full_name') this.fullName = event.target.value;
                    if (event.target.name === 'profession') this.profession = event.target.value;
                    if (event.target.name === 'email') this.email = event.target.value;
                    if (event.target.name === 'phone') this.phone = event.target.value;
                    if (event.target.name === 'address') this.address = event.target.value;
                    if (event.target.name === 'summary') this.summary = event.target.value;
                    if (event.target.name === 'skills') this.skills = event.target.value;
                },

                handlePhotoSelect(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.photoPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                },

                handleDrop(event) {
                    event.preventDefault();
                    this.dragover = false;
                    const files = event.dataTransfer.files;
                    if (files.length > 0) {
                        this.$refs.photoInput.files = files;
                        this.handlePhotoSelect({ target: this.$refs.photoInput });
                    }
                },

                removePhoto() {
                    this.photoPreview = null;
                    this.$refs.photoInput.value = '';
                },

                formatContactInfo() {
                    let parts = [];
                    if (this.email) parts.push(`📧 ${this.email}`);
                    if (this.phone) parts.push(`📱 ${this.phone}`);
                    if (this.address) parts.push(`📍 ${this.address}`);
                    return parts.map(p => `<span style="display: inline-block; margin-right: 12px;">${p}</span>`).join('');
                },

                onFormSubmit(event) {
                    // Allow normal form submission
                }
            }
        }
    </script>

</body>
</html>
