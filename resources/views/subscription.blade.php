<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Langganan - ShowCase U</title>
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
<body class="bg-brand-sky min-h-screen">

    <nav class="bg-brand-white shadow-sm sticky top-0 z-50 rounded-b-[30px] mx-2 mt-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center gap-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-gray-500 hover:text-brand-pink transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span class="font-bold">Kembali</span>
                    </a>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-gray-700">Premium</span>
                    <span class="text-2xl">✨</span>
                </div>
                <div class="w-10"></div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-16 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Pilih Paket Sesuai Kebutuhanmu</h2>
        <p class="text-gray-500 mb-12">Upgrade akunmu untuk mendapatkan akses fitur tak terbatas.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-2 transition duration-300">
                <div class="w-16 h-16 bg-brand-sky rounded-full flex items-center justify-center text-3xl mx-auto mb-6">⭐</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Gratis</h3>
                <p class="text-4xl font-bold text-brand-blue mb-6">Rp 0</p>
                <button class="w-full py-3 rounded-2xl border-2 border-brand-sky text-brand-blue font-bold cursor-not-allowed opacity-50">Saat Ini</button>
            </div>

            <div class="bg-white rounded-[40px] p-8 shadow-xl border-2 border-brand-pink flex flex-col transform md:scale-110 z-10 relative">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-brand-pink text-white px-4 py-1 rounded-full text-xs font-bold shadow-md">BEST SELLER</div>
                <div class="w-16 h-16 bg-brand-peach rounded-full flex items-center justify-center text-3xl mx-auto mb-6">🚀</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Pro</h3>
                <p class="text-4xl font-bold text-brand-pink mb-6">Rp 50rb</p>
                <button class="w-full bg-brand-pink text-white py-4 rounded-2xl font-bold shadow-lg shadow-pink-200 hover:bg-red-300 transition">Upgrade Sekarang</button>
            </div>

            <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-2 transition duration-300">
                <div class="w-16 h-16 bg-brand-sky rounded-full flex items-center justify-center text-3xl mx-auto mb-6">👑</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Bisnis</h3>
                <p class="text-4xl font-bold text-brand-blue mb-6">Rp 100rb</p>
                <button class="w-full py-3 rounded-2xl border-2 border-brand-blue text-brand-blue font-bold hover:bg-brand-sky transition">Hubungi Sales</button>
            </div>
        </div>
    </div>
</body>
</html>