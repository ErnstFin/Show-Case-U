<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolio->title }} - ShowCase U</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-pink': '#FFB5B6',
                        'brand-peach': '#FFE5D9',
                        'brand-white': '#FFFFFF',
                        'brand-sky': '#D6EBF2',
                        'brand-blue': '#A3C4D9',
                    },
                    fontFamily: { 'poppins': ['Poppins', 'sans-serif'] }
                }
            }
        }
    </script>
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-brand-sky min-h-screen py-10 px-4">

    <div class="max-w-4xl mx-auto bg-white rounded-[40px] shadow-2xl overflow-hidden border border-white">
        
        <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-white">
            <a href="{{ route('dashboard') }}" class="flex items-center text-gray-500 hover:text-brand-pink transition gap-2 font-medium text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
            <span class="bg-brand-peach text-gray-700 px-4 py-1.5 rounded-full text-xs font-bold tracking-wide">
                {{ $portfolio->category }}
            </span>
        </div>

        <div class="md:flex">
            <div class="md:w-1/2 bg-brand-peach/20 p-8 flex items-center justify-center">
                <img src="{{ asset('storage/' . $portfolio->file_path) }}" alt="{{ $portfolio->title }}" class="rounded-2xl shadow-lg max-h-[500px] object-contain bg-white">
            </div>

            <div class="md:w-1/2 p-10 flex flex-col justify-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-2 leading-tight">{{ $portfolio->title }}</h1>
                
                <div class="flex items-center gap-2 text-brand-blue text-xs font-bold mb-8 uppercase tracking-wider">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $portfolio->created_at->format('d M Y') }}
                </div>

                <div class="prose max-w-none text-gray-600 leading-relaxed mb-8">
                    <h3 class="font-bold text-gray-800 mb-2 text-sm uppercase">Deskripsi Project</h3>
                    <p class="whitespace-pre-line text-sm">{{ $portfolio->description ?? 'Tidak ada deskripsi tambahan.' }}</p>
                </div>

                <div class="flex gap-3 mt-auto pt-8 border-t border-gray-50">
                    <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="flex-1 bg-brand-pink text-white py-3 rounded-xl font-bold hover:bg-red-300 transition shadow-lg shadow-pink-100 text-center">
                        Edit
                    </a>

                    <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus portofolio ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full border-2 border-red-100 text-red-400 py-3 rounded-xl font-bold hover:bg-red-50 transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>