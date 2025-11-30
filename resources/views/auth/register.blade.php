<<<<<<< HEAD
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - ShowCase U</title>
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
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-30">
                <div class="absolute -top-20 -left-20 w-64 h-64 bg-brand-pink rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
            </div>

            <div class="relative z-10">
                <div class="bg-white w-20 h-20 rounded-3xl flex items-center justify-center shadow-lg mb-6 mx-auto animate-bounce">
                    <span class="text-4xl font-bold text-brand-pink">S</span>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar Dulu Yuk!</h2>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Daftar untuk menggunakan berbagai fitur terbaik di ShowCase U.
                </p>
            </div>
        </div>

        <div class="w-full md:w-7/12 p-8 md:p-12 bg-white flex flex-col justify-center">
            
            <h1 class="text-2xl font-bold text-gray-800 mb-1 md:hidden">Buat Akun</h1>
            
            <form action="{{ route('register.submit') }}" method="POST" class="space-y-5">
                @csrf
                
                <button type="button" class="w-full flex items-center justify-center gap-3 bg-white border border-gray-200 py-3 rounded-2xl shadow-sm hover:bg-gray-50 transition text-sm font-medium text-gray-600">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google">
                    Daftar dengan Google
                </button>

                <div class="relative flex py-2 items-center">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink-0 mx-4 text-gray-400 text-xs">Atau daftar manual</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <div class="space-y-4">
                    <input type="text" name="name" placeholder="Nama Lengkap" class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-3.5 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm">
                    
                    <input type="email" name="email" placeholder="Email" class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-3.5 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="password" name="password" placeholder="Password" class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-3.5 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm">
                        <input type="password" name="password_confirmation" placeholder="Ulangi" class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-3.5 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm">
                    </div>
                </div>

                <button type="submit" class="w-full bg-brand-pink text-white font-bold py-4 rounded-2xl shadow-lg shadow-pink-200 hover:bg-red-300 transition transform hover:-translate-y-1 mt-4">
                    Buat Akun Sekarang
                </button>
            </form>

            <div class="mt-8 text-center text-sm">
                <p class="text-gray-500">Sudah punya akun? <a href="{{ route('login') }}" class="text-brand-pink font-bold hover:underline">Login disini</a></p>
            </div>
        </div>

    </div>

</body>
</html>
>>>>>>> origin/Jojo
