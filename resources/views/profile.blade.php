<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akun Saya - ShowCase U</title>
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
                <div class="flex items-center">
                    <span class="text-xl font-bold text-gray-700">Pengaturan Akun</span>
                </div>
                <div class="w-10"></div> </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 py-10">
        
        <div class="bg-white rounded-[40px] shadow-xl overflow-hidden flex flex-col md:flex-row min-h-[500px]">
            
            <div class="w-full md:w-1/3 bg-brand-peach flex flex-col items-center justify-center p-8 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full bg-white opacity-10 blur-3xl"></div>
                
                <div class="relative z-10">
                    <div class="w-28 h-28 rounded-full border-4 border-white shadow-md overflow-hidden mx-auto mb-4 bg-white">
                        <img src="{{ str_contains($user->avatar, 'http') ? $user->avatar : asset($user->avatar) }}" 
                             alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">{{ $user->name }}</h2>
                    <p class="text-xs text-gray-500 mb-6">{{ $user->email }}</p>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="bg-white text-red-400 px-6 py-2 rounded-full font-bold shadow-sm hover:bg-red-50 transition text-sm flex items-center gap-2 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <div class="w-full md:w-2/3 p-8 md:p-12">
                <h3 class="text-xl font-bold text-gray-700 mb-6">Edit Profil</h3>

                @if(session('success'))
                    <div class="bg-green-100 text-green-600 px-4 py-3 rounded-xl mb-6 text-sm text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-2">Username</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-gray-50 border-none rounded-2xl px-5 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition text-gray-700">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-gray-50 border-none rounded-2xl px-5 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition text-gray-700">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-2">Ganti Foto (Opsional)</label>
                        <input type="file" name="avatar" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-brand-sky file:text-brand-blue hover:file:bg-brand-peach transition"/>
                    </div>

                    <hr class="border-gray-100 my-4">

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-2">Password Baru (Opsional)</label>
                        <input type="password" name="password" placeholder="Isi jika ingin mengganti" class="w-full bg-gray-50 border-none rounded-2xl px-5 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition">
                    </div>

                    <div>
                        <input type="password" name="password_confirmation" placeholder="Ulangi Password Baru" class="w-full bg-gray-50 border-none rounded-2xl px-5 py-3 focus:ring-2 focus:ring-brand-pink outline-none transition">
                    </div>

                    <button type="submit" class="w-full bg-brand-pink text-white font-bold py-3.5 rounded-2xl shadow-lg shadow-pink-200 hover:bg-red-300 transition mt-4">
                        Simpan Perubahan
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>