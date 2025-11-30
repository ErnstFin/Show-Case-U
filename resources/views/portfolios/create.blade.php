<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Unggah Karya - ShowCase U</title>
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
<body class="bg-brand-sky min-h-screen flex items-center justify-center py-10 px-4">

    <div class="bg-white w-full max-w-4xl rounded-[35px] shadow-xl overflow-hidden relative border border-white">
        
        <div class="bg-brand-peach px-8 py-6 flex justify-between items-center">
            <div>
                <h1 class="text-gray-800 font-bold text-xl">Upload Karya Baru</h1>
                <p class="text-xs text-gray-500">Lengkapi detail portofolio kamu</p>
            </div>
            <a href="{{ route('dashboard') }}" class="w-8 h-8 bg-white/50 rounded-full flex items-center justify-center text-gray-600 hover:bg-white transition">&times;</a>
        </div>

        <div class="p-8 md:p-10">
            <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Judul</label>
                            <input type="text" name="title" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition" placeholder="Contoh: Website Toko Online">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Kategori</label>
                            <select name="category" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition">
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Mobile App">Mobile App</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Deskripsi</label>
                            <textarea name="description" rows="5" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition" placeholder="Deskripsi karyamu..."></textarea>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">File (Gambar / PDF)</label>
                        
                        <div class="flex-grow border-2 border-dashed border-brand-blue/30 rounded-3xl bg-gray-50 hover:bg-brand-sky/20 transition relative flex items-center justify-center min-h-[250px] overflow-hidden group">
                            
                            <input type="file" name="file" id="fileInput" accept=".jpg,.jpeg,.png,.pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewFile(event)">
                            
                            <div id="dropZoneText" class="text-center p-6 transition-all duration-300">
                                <div class="w-16 h-16 bg-brand-peach rounded-full flex items-center justify-center mx-auto mb-3 text-brand-pink">
                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                </div>
                                <p class="text-sm font-bold text-gray-600">Drag & Drop atau Klik</p>
                                <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, PDF (Max 5MB)</p>
                            </div>

                            <img id="imagePreview" class="hidden absolute inset-0 w-full h-full object-cover z-10" src="#" alt="Preview">
                            
                            <div id="pdfPreview" class="hidden absolute inset-0 w-full h-full z-10 bg-white flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center mb-3 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-sm font-bold text-gray-700">File PDF Terpilih</p>
                                <p id="pdfName" class="text-xs text-gray-500 mt-1 px-4 text-center truncate w-full">nama-file.pdf</p>
                            </div>
                            
                            <div id="changeOverlay" class="hidden absolute inset-0 bg-black/40 z-20 flex items-center justify-center text-white text-sm font-bold opacity-0 group-hover:opacity-100 transition">
                                Klik untuk ganti file
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full bg-brand-pink text-white font-bold py-4 rounded-2xl shadow-lg shadow-pink-200 hover:bg-red-300 transition mt-6">
                            Terbitkan Portofolio
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script>
        function previewFile(event) {
            const input = event.target;
            const file = input.files[0];
            
            // Ambil elemen UI
            const dropText = document.getElementById('dropZoneText');
            const imgPrev = document.getElementById('imagePreview');
            const pdfPrev = document.getElementById('pdfPreview');
            const pdfName = document.getElementById('pdfName');
            const overlay = document.getElementById('changeOverlay');

            if (file) {
                // Sembunyikan teks default "Drag & Drop"
                dropText.classList.add('hidden');
                // Munculkan overlay hover
                overlay.classList.remove('hidden');

                // Cek Tipe File
                if (file.type.match('image.*')) {
                    // Kalo file-nya GAMBAR
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imgPrev.src = e.target.result;
                        imgPrev.classList.remove('hidden'); // Munculkan <img>
                        pdfPrev.classList.add('hidden');    // Sembunyikan ikon PDF
                    }
                    reader.readAsDataURL(file);
                } 
                else if (file.type === 'application/pdf') {
                    // Kalo file-nya PDF
                    imgPrev.classList.add('hidden');     // Sembunyikan <img>
                    pdfPrev.classList.remove('hidden');  // Munculkan ikon PDF
                    pdfName.innerText = file.name;       // Tampilkan nama file
                }
            }
        }
    </script>

</body>
</html>