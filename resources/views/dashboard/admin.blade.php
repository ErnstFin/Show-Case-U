<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard Admin') }}
            </h2>
            <span class="text-xs uppercase tracking-wider text-white bg-primary-600 px-3 py-1 rounded-full">
                Admin
            </span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Pengguna</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['users'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total File</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['files'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Admin Aktif</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['admins'] }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">File Terbaru</h3>
                    @if ($recentFiles->isEmpty())
                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada file yang tersimpan.</p>
                    @else
                        <div class="space-y-3">
                            @foreach ($recentFiles as $file)
                                <div class="flex items-center justify-between border rounded-lg px-4 py-3 dark:border-gray-700">
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $file->original_name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            Oleh {{ $file->user->name }} • {{ $file->readable_size }}
                                        </p>
                                    </div>
                                    <span class="text-xs text-gray-500 dark:text-gray-300">{{ $file->updated_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Pengguna Baru</h3>
                    @if ($recentUsers->isEmpty())
                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada pendaftar baru.</p>
                    @else
                        <div class="space-y-3">
                            @foreach ($recentUsers as $user)
                                <div class="flex items-center justify-between border rounded-lg px-4 py-3 dark:border-gray-700">
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                                    </div>
                                    <span class="text-xs text-gray-500 dark:text-gray-300">{{ $user->created_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

