<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Show Case U</title>
    {{-- Memanggil CSS Tailwind bawaan Laravel (Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
            <div class="h-16 flex items-center justify-center border-b border-gray-200">
                <h1 class="text-xl font-bold text-gray-800">Show Case U</h1>
            </div>

            <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                {{-- Menu Item Helper --}}
                @php
                    $menus = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'dashboard'],
                        ['route' => 'admin.portfolios', 'label' => 'Verifikasi Portofolio', 'icon' => 'folder'],
                        ['route' => 'admin.users', 'label' => 'Data Pengguna', 'icon' => 'users'],
                        ['route' => 'admin.companies', 'label' => 'Akses Perusahaan', 'icon' => 'building'],
                        ['route' => 'admin.settings', 'label' => 'Pengaturan', 'icon' => 'settings'],
                    ];
                @endphp

                @foreach($menus as $menu)
                    <a href="{{ Route::has($menu['route']) ? route($menu['route']) : '#' }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors 
                       {{ request()->routeIs($menu['route']) ? 'bg-[#B3D1F0] text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                        {{ $menu['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="p-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-sm text-red-600 hover:bg-red-50 px-4 py-2 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="bg-white border-b border-gray-200 h-16 flex items-center px-6">
                <h2 class="font-semibold text-xl text-gray-800">
                    @yield('header')
                </h2>
            </header>

            <main class="flex-1 overflow-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>