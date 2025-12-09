<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit CV - ShowCase U</title>
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
    <style> 
        body { font-family: 'Poppins', sans-serif; }
        .input-field { 
            @apply w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:outline-none focus:border-brand-pink transition text-sm;
        }
        .label-text { 
            @apply block font-semibold text-gray-700 text-sm mb-2;
        }
    </style>
</head>
<body class="bg-brand-sky min-h-screen py-10 px-4">

    <div class="max-w-5xl mx-auto mb-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="bg-white p-2 rounded-full shadow-sm hover:bg-brand-peach transition text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-700">Edit CV</h1>
        </div>
        
        <div class="flex gap-2">
            <a href="{{ route('cv.download') }}" target="_blank" class="bg-brand-blue text-white px-6 py-2 rounded-full font-bold shadow-lg hover:bg-blue-400 transition flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                Preview
            </a>
            <a href="{{ route('cv.select_template') }}" class="bg-brand-peach text-gray-700 px-6 py-2 rounded-full font-bold shadow-lg hover:bg-orange-200 transition flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
                Ganti Template
            </a>
        </div>
    </div>

    <div class="bg-white w-full max-w-5xl mx-auto rounded-[35px] shadow-xl overflow-hidden border border-white">
        
        <div class="bg-brand-peach px-8 py-6">
            <h2 class="text-gray-800 font-bold text-xl">Perbarui Data CV</h2>
            <p class="text-xs text-gray-500">Ubah informasi CV kamu kapan saja. Perubahan akan otomatis tersimpan.</p>
        </div>

        <div class="p-8 md:p-10">
            @if(session('success'))
                <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-2xl mb-6 text-center font-medium">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-2xl mb-6">
                    <p class="font-bold mb-2">Terjadi Kesalahan:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cv.update', $cv->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                {{-- Template field (hidden) --}}
                <input type="hidden" name="template" value="{{ $cv->template }}">

                {{-- FOTO PROFIL --}}
                <h3 class="text-brand-blue font-bold uppercase text-xs tracking-widest mb-4 border-b border-gray-100 pb-2">📸 Foto Profil</h3>
                <div class="mb-8">
                    <label class="label-text">Foto Profil (Opsional)</label>
                    <p class="text-[10px] text-gray-400 mb-3">Format: PNG, JPEG, JPG, GIF | Max 5MB</p>
                    
                    <div class="mb-4 flex items-center gap-4">
                        @if($cv->photo_path)
                        <div class="relative">
                            <img src="{{ asset('storage/' . $cv->photo_path) }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover border-4 border-brand-pink">
                            <button type="button" onclick="document.getElementById('removePhotoBtn').value = '1'; this.style.display = 'none';" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm hover:bg-red-600">
                                ✕
                            </button>
                            <input type="hidden" id="removePhotoBtn" value="0">
                        </div>
                        @else
                        <div class="w-24 h-24 rounded-full bg-brand-peach flex items-center justify-center text-4xl font-bold text-brand-pink">
                            {{ substr($cv->full_name, 0, 1) }}
                        </div>
                        @endif
                        
                        <div class="flex-1">
                            <label class="flex items-center gap-2 cursor-pointer bg-brand-peach hover:bg-orange-200 text-gray-700 px-4 py-2 rounded-xl font-semibold text-sm transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Ganti Foto
                                <input type="file" name="photo" accept="image/*" class="hidden" onchange="previewPhoto(this)">
                            </label>
                        </div>
                    </div>
                </div>
                <h3 class="text-brand-blue font-bold uppercase tracking-wide text-sm mb-4 border-b border-gray-100 pb-2">Informasi Kontak</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="label-text">Nama Lengkap</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $cv->full_name) }}" class="input-field" required>
                        @error('full_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="label-text">Profesi / Posisi</label>
                        <input type="text" name="profession" value="{{ old('profession', $cv->profession) }}" class="input-field" required>
                        @error('profession')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="label-text">Email</label>
                        <input type="email" name="email" value="{{ old('email', $cv->email) }}" class="input-field" required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="label-text">No. Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $cv->phone) }}" class="input-field" required>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="label-text">Alamat Domisili</label>
                        <input type="text" name="address" value="{{ old('address', $cv->address) }}" class="input-field" required>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="label-text">Tentang Saya (Summary)</label>
                        <textarea name="summary" rows="3" class="input-field" required>{{ old('summary', $cv->summary) }}</textarea>
                        @error('summary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- KUALIFIKASI --}}
                <h3 class="text-brand-blue font-bold uppercase tracking-wide text-sm mb-4 border-b border-gray-100 pb-2">Kualifikasi</h3>
                <div class="space-y-6">
                    <div>
                        <label class="label-text">Keahlian (Skills)</label>
                        <p class="text-[10px] text-gray-400 mb-1">Pisahkan dengan koma</p>
                        <textarea name="skills" rows="2" class="input-field" required>{{ old('skills', $cv->skills) }}</textarea>
                        @error('skills')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="label-text">Riwayat Pendidikan</label>
                        <textarea name="education" rows="4" class="input-field" required>{{ old('education', $cv->education) }}</textarea>
                        @error('education')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="label-text">Pengalaman Kerja</label>
                        <textarea name="experience" rows="5" class="input-field" required>{{ old('experience', $cv->experience) }}</textarea>
                        @error('experience')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="mt-8 flex justify-end gap-3">
                    <a href="{{ route('dashboard') }}" class="bg-gray-300 text-gray-700 font-bold py-3 px-8 rounded-2xl hover:bg-gray-400 transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-brand-pink text-white font-bold py-3 px-8 rounded-2xl shadow-lg shadow-pink-200 hover:bg-red-300 transition transform hover:-translate-y-1">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="max-w-5xl mx-auto mt-6 text-center text-xs text-gray-600">
        <p>📝 Dikerjakan pada: {{ $cv->created_at->format('d M Y H:i') }} | Terakhir diubah: {{ $cv->updated_at->format('d M Y H:i') }}</p>
    </div>

    <script>
        function previewPhoto(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Find the photo preview container
                    const photoContainer = input.closest('.mb-4').querySelector('img') || 
                                          input.closest('.mb-4').querySelector('div[class*="rounded-full"]');
                    
                    if (photoContainer && photoContainer.tagName === 'IMG') {
                        photoContainer.src = e.target.result;
                    } else if (photoContainer) {
                        // Replace the circular initial with image
                        const newImg = document.createElement('img');
                        newImg.src = e.target.result;
                        newImg.alt = 'Foto Profil';
                        newImg.className = 'w-24 h-24 rounded-full object-cover border-4 border-brand-pink';
                        photoContainer.parentNode.replaceChild(newImg, photoContainer);
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>
