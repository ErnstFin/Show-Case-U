<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ShowCase U</title>
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
<body class="bg-brand-sky min-h-screen">

    <nav class="bg-brand-white shadow-sm sticky top-0 z-50 rounded-b-[30px] mx-2 mt-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-brand-peach rounded-full flex items-center justify-center text-brand-pink font-bold">S</div>
                    <span class="text-2xl font-bold text-gray-700">ShowCase U</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('cv.create') }}" class="bg-brand-sky text-gray-600 border border-brand-blue px-5 py-2.5 rounded-2xl text-sm font-bold hover:bg-white transition hidden sm:block">
                        Buat CV
                    </a>

                    <a href="{{ route('portfolios.create') }}" class="bg-brand-pink text-white px-5 py-2.5 rounded-2xl text-sm font-bold shadow-md shadow-pink-200 hover:bg-red-300 transition">
                        + Baru
                    </a>
                    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-400 text-sm font-medium">
                            Keluar
                        </button>
                    </form>

                    <a href="{{ route('profile.edit') }}" class="w-10 h-10 rounded-full bg-brand-peach border-2 border-white overflow-hidden shadow-sm block hover:scale-105 transition transform cursor-pointer">
                        <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=User' }}" alt="User" class="w-full h-full object-cover">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-700">Dashboard Saya</h2>
            <div class="flex items-center gap-2">
                <a href="{{ route('subscription.index') }}" class="w-8 h-8 flex items-center justify-center bg-yellow-100 text-yellow-500 rounded-full hover:bg-yellow-200 transition" title="Langganan Premium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 011.397 1.398l-.8 1.6 1.582 3.954a1 1 0 01-1.323 1H4.323a1 1 0 01-1.323-1l1.582-3.954-.8-1.6a1 1 0 011.397-1.398l1.599.8L9 4.323V3a1 1 0 011-1zm-5 8.274V16a1 1 0 001 1h8a1 1 0 001-1v-5.726l-1.356.678a1 1 0 01-1.171-.138l-1.57-1.047-1.57 1.047a1 1 0 01-1.171.138L5 10.274zm2.607-4.21l.86.43a1 1 0 01.498.766l.23 2.303.23-2.303a1 1 0 01.498-.766l.86-.43-1.486-.595L10 4.16l-1.697 1.697-1.486.595z" clip-rule="evenodd" />
                    </svg>
                </a>
                <span class="bg-white px-4 py-1 rounded-full text-xs font-medium text-brand-blue shadow-sm">
                    {{ $portfolios->count() }} Karya
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($portfolios as $portfolio)
            <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden border border-white flex flex-col group">
                
                <div class="h-52 w-full bg-gray-50 relative overflow-hidden flex items-center justify-center">
                    @if(str_ends_with(strtolower($portfolio->file_path), '.pdf'))
                        <div class="flex flex-col items-center justify-center text-red-400 group-hover:scale-110 transition duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Dokumen PDF</span>
                        </div>
                    @else
                        <img src="{{ asset('storage/' . $portfolio->file_path) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @endif

                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1.5 rounded-xl text-gray-600 shadow-sm">
                        {{ $portfolio->category }}
                    </span>
                </div>
                
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-bold text-gray-800 text-lg truncate mb-1">{{ $portfolio->title }}</h3>
                    <p class="text-gray-500 text-sm line-clamp-2 mb-4 flex-grow leading-relaxed">
                        {{ $portfolio->description ?? 'Tidak ada deskripsi.' }}
                    </p>
                    
                    <div class="pt-4 border-t border-dashed border-gray-100 flex justify-between items-center">
                        <span class="text-xs text-brand-blue font-medium">{{ $portfolio->created_at->diffForHumans() }}</span>
                        <a href="{{ route('portfolios.show', $portfolio->id) }}" class="text-brand-pink hover:text-red-400 text-sm font-bold flex items-center gap-1">
                            Lihat Detail &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 bg-white/50 rounded-3xl border border-dashed border-brand-blue">
                <div class="bg-brand-peach w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-brand-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </div>
                <p class="text-gray-500 font-medium mb-2">Belum ada portofolio.</p>
                <a href="{{ route('portfolios.create') }}" class="text-brand-pink font-bold hover:underline">Upload karya pertamamu!</a>
            </div>
            @endforelse
        </div>
    </main>

</body>
</html>