<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Portofolio</title>
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
            <h1 class="text-gray-800 font-bold text-xl">Edit Portofolio</h1>
            <a href="{{ route('dashboard') }}" class="w-8 h-8 bg-white/50 rounded-full flex items-center justify-center text-gray-600 hover:bg-white transition">&times;</a>
        </div>

        <div class="p-8 md:p-10">
            <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Judul</label>
                            <input type="text" name="title" value="{{ old('title', $portfolio->title) }}" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Kategori</label>
                            <select name="category" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition">
                                <option value="UI/UX Design" {{ $portfolio->category == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                <option value="Web Development" {{ $portfolio->category == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                <option value="Mobile App" {{ $portfolio->category == 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Deskripsi</label>
                            <textarea name="description" rows="5" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition">{{ old('description', $portfolio->description) }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Ganti Gambar (Opsional)</label>
                        
                        <div class="mb-4 rounded-2xl overflow-hidden h-40 bg-gray-100">
                            <img src="{{ asset('storage/' . $portfolio->file_path) }}" class="w-full h-full object-cover opacity-70">
                        </div>

                        <div class="flex-grow border-2 border-dashed border-brand-blue/30 rounded-3xl bg-gray-50 hover:bg-brand-sky/20 transition relative flex items-center justify-center min-h-[120px]">
                            <input type="file" name="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <p class="text-xs font-bold text-gray-500">Klik untuk ganti gambar baru</p>
                        </div>
                        
                        <button type="submit" class="w-full bg-brand-pink text-white font-bold py-4 rounded-2xl shadow-lg shadow-pink-200 hover:bg-red-300 transition transform hover:-translate-y-1 mt-6">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>