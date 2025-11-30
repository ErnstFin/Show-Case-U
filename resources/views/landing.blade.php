<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShowCase U - Portofolio & CV Maker</title>
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
<body class="bg-brand-sky min-h-screen flex flex-col">

    <nav class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center z-50">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-brand-peach rounded-full flex items-center justify-center text-brand-pink font-bold text-xl shadow-sm">S</div>
            <span class="text-2xl font-bold text-gray-700 tracking-wide">ShowCase U</span>
        </div>
        
        <div class="flex items-center gap-4">
            @if(Auth::check())
                <a href="{{ route('dashboard') }}" class="bg-brand-pink text-white px-6 py-2.5 rounded-full font-bold shadow-lg shadow-pink-200 hover:bg-red-300 transition transform hover:-translate-y-1">
                    Dashboard Saya
                </a>
            @else
                <a href="{{ route('login') }}" class="text-gray-500 font-bold hover:text-brand-pink transition hidden sm:block">Masuk</a>
                <a href="{{ route('register') }}" class="bg-brand-pink text-white px-6 py-2.5 rounded-full font-bold shadow-lg shadow-pink-200 hover:bg-red-300 transition transform hover:-translate-y-1">
                    Daftar Sekarang
                </a>
            @endif
        </div>
    </nav>

    <main class="flex-grow flex flex-col md:flex-row items-center justify-center max-w-7xl mx-auto px-6 py-10 md:py-0">
        
        <div class="w-full md:w-1/2 text-center md:text-left z-10">
            <span class="bg-white text-brand-pink px-4 py-1.5 rounded-full text-xs font-bold shadow-sm uppercase tracking-wider mb-4 inline-block">
                🚀 Platform Karir #1 Mahasiswa
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 leading-tight mb-6">
                Buat <span class="text-brand-pink">CV Kreatif</span> & Portofolio dalam Sekejap!
            </h1>
            <p class="text-gray-500 text-lg mb-8 leading-relaxed max-w-lg mx-auto md:mx-0">
                ShowCase U membantu kamu mengelola karya terbaik dan membuat CV profesional otomatis. Simpel, Cepat, dan Gratis.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                <a href="{{ route('register') }}" class="bg-brand-pink text-white px-8 py-4 rounded-2xl font-bold shadow-xl shadow-pink-200 hover:bg-red-300 transition flex items-center justify-center gap-2">
                    Mulai Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                <a href="#fitur" class="bg-white text-gray-600 px-8 py-4 rounded-2xl font-bold hover:bg-gray-50 transition shadow-sm border border-gray-100">
                    Pelajari Dulu
                </a>
            </div>

            <div class="mt-10 flex items-center justify-center md:justify-start gap-8 opacity-70">
                <div>
                    <span class="block text-2xl font-bold text-gray-800">10k+</span>
                    <span class="text-xs text-gray-500">Mahasiswa</span>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-gray-800">500+</span>
                    <span class="text-xs text-gray-500">Template CV</span>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-gray-800">100%</span>
                    <span class="text-xs text-gray-500">Gratis</span>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 mt-12 md:mt-0 relative">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-brand-peach rounded-full opacity-50 blur-3xl z-0"></div>
            
            <div class="relative z-10 bg-white/40 backdrop-blur-sm border border-white/50 p-6 rounded-[40px] shadow-2xl transform rotate-3 hover:rotate-0 transition duration-500">
                <div class="bg-white rounded-[30px] p-6 shadow-sm border border-gray-100 aspect-[3/4] flex flex-col">
                    <div class="flex gap-4 mb-6">
                        <div class="w-16 h-16 bg-brand-peach rounded-full"></div>
                        <div class="flex-1 space-y-2 py-2">
                            <div class="h-4 bg-gray-100 rounded w-3/4"></div>
                            <div class="h-3 bg-gray-100 rounded w-1/2"></div>
                        </div>
                    </div>
                    <div class="space-y-3 flex-grow">
                        <div class="h-20 bg-brand-sky/30 rounded-xl"></div>
                        <div class="h-20 bg-brand-sky/30 rounded-xl"></div>
                        <div class="h-20 bg-brand-sky/30 rounded-xl"></div>
                    </div>
                    <div class="mt-4 h-10 bg-brand-pink rounded-xl w-full"></div>
                </div>
                
                <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-2xl shadow-xl flex items-center gap-3 animate-bounce">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Status</p>
                        <p class="text-sm font-bold text-gray-800">Siap Kerja!</p>
                    </div>
                </div>
            </div>
        </div>

    </main>

</body>
</html>