<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - ShowCase U</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-brand-sky min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-5xl bg-brand-white rounded-[35px] overflow-hidden shadow-2xl flex flex-col md:flex-row min-h-[600px]">
        
        <div class="w-full md:w-5/12 bg-brand-peach relative flex flex-col items-center justify-center p-10 text-center">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full opacity-20 blur-2xl"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-brand-pink rounded-full opacity-30 blur-2xl"></div>

            <div class="relative z-10">
                <div class="bg-white p-4 rounded-full shadow-md mb-6 inline-block">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-brand-pink" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang!</h2>
                <p class="text-sm text-gray-600">Masuk untuk mengelola portofolio profesionalmu.</p>
            </div>
        </div>

        <div class="w-full md:w-7/12 p-8 md:p-16 bg-white flex flex-col justify-center">
            
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">Masuk</h1>

            <button class="w-full flex items-center justify-center gap-3 bg-white border border-gray-200 py-3 rounded-2xl shadow-sm hover:bg-gray-50 transition text-sm font-medium text-gray-600 mb-6">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google">
                Masuk dengan Google
            </button>

            <div class="relative flex py-2 items-center mb-6">
                <div class="flex-grow border-t border-gray-200"></div>
                <span class="flex-shrink-0 mx-4 text-gray-400 text-xs">Atau email</span>
                <div class="flex-grow border-t border-gray-200"></div>
            </div>

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                @csrf
                
                @error('email')
                    <div class="bg-red-50 text-red-500 text-xs p-3 rounded-xl text-center">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <label class="block text-xs font-bold text-gray-500 ml-1 mb-1">Email</label>
                    <input type="email" name="email" class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm" placeholder="user@showcase.com">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 ml-1 mb-1">Password</label>
                    <input type="password" name="password" class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm" placeholder="••••••••">
                </div>

                <div class="flex justify-end">
                    <a href="#" class="text-xs text-brand-blue font-bold hover:underline">Lupa Password?</a>
                </div>

                <button type="submit" class="w-full bg-brand-pink text-white font-bold py-4 rounded-2xl shadow-lg shadow-pink-200 hover:bg-red-300 transition transform hover:-translate-y-1">
                    Masuk
                </button>
            </form>

            <div class="mt-8 text-center text-sm">
                <p class="text-gray-500">Belum punya akun? <a href="{{ route('register') }}" class="text-brand-pink font-bold hover:underline">Daftar sekarang</a></p>
            </div>
        </div>

    </div>

</body>
</html>