<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total File</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $totalFiles }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Terakhir diperbarui</p>
                    <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $recentFiles->first()?->updated_at?->diffForHumans() ?? 'Belum ada data' }}
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Akses Cepat</p>
                    <div class="mt-3 space-y-2">
                        <a href="{{ route('home') }}" class="inline-flex items-center text-primary-600 hover:underline">
                            ➜ Buka Home
                        </a>
                        <a href="{{ route('builder') }}" class="block text-primary-600 hover:underline">
                            ➜ Buat CV ATS Baru
                        </a>
                        <a href="{{ route('profile.edit') }}" class="block text-gray-600 dark:text-gray-300 hover:underline">
                            Perbarui Profil
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">File Terbaru</h3>
                    <a href="{{ route('home') }}" class="text-sm text-primary-600 hover:underline">Lihat Semua</a>
                </div>

                @if ($recentFiles->isEmpty())
                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada file di riwayat Anda.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($recentFiles as $file)
                            <div class="flex items-center justify-between border rounded-lg px-4 py-3 dark:border-gray-700">
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $file->original_name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Ukuran: {{ $file->readable_size }}</p>
                                </div>
                                <span class="text-sm text-gray-500 dark:text-gray-300">{{ $file->updated_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

