<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <p class="text-sm text-gray-500 dark:text-gray-400">Selamat datang kembali, {{ auth()->user()->name }} 👋</p>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                        Riwayat CV ATS ({{ $totalFiles }})
                    </h3>

                    @if ($files->isEmpty())
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Belum ada CV yang tersimpan. Klik tombol <strong>Buat CV ATS Baru</strong> untuk mulai membuat dan riwayat akan terisi otomatis setelah Anda mengunduh CV.
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                                <thead class="bg-gray-50 dark:bg-gray-700/50">
                                    <tr>
                                        <th class="px-4 py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Nama File
                                        </th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Ukuran
                                        </th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Terakhir Diubah
                                        </th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                                    @foreach ($files as $file)
                                        <tr>
                                            <td class="px-4 py-3">
                                                <p class="font-semibold text-gray-800 dark:text-gray-100">
                                                    {{ $file->original_name }}
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    disimpan sebagai {{ $file->stored_name }}
                                                </p>
                                            </td>
                                            <td class="px-4 py-3 text-gray-600 dark:text-gray-200">
                                                {{ $file->readable_size }}
                                            </td>
                                            <td class="px-4 py-3 text-gray-600 dark:text-gray-200">
                                                {{ $file->updated_at->diffForHumans() }}
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                                <a href="{{ route('home.files.download', $file) }}"
                                                   class="inline-flex items-center gap-2 text-sm font-medium text-primary-600 hover:text-primary-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M7.5 10.5L12 15m0 0l4.5-4.5M12 15V3"/>
                                                    </svg>
                                                    Download PDF
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $files->links() }}
                        </div>
                    @endif
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 h-fit">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Tambah CV ATS Baru
                            </h3>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                Gunakan Resume Builder kami untuk membuat CV ramah ATS. Setiap kali Anda mengunduh CV,
                                versinya otomatis tersimpan di riwayat.
                            </p>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-primary-100 px-2 py-0.5 text-xs font-semibold text-primary-700 dark:bg-primary-900/30 dark:text-primary-200">
                            Baru
                        </span>
                    </div>

                    <div class="mt-6 space-y-4">
                        <a href="{{ route('builder') }}"
                           class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-primary-600 px-4 py-2.5 font-semibold text-white shadow hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            ✨ Buat CV ATS Baru
                        </a>

                        <div class="rounded-lg border border-dashed border-gray-300 dark:border-gray-700 p-4 text-sm text-gray-600 dark:text-gray-300 space-y-2">
                            <p class="font-semibold text-gray-800 dark:text-gray-200">Apa yang terjadi selanjutnya?</p>
                            <ul class="list-disc space-y-1 pl-4">
                                <li>Lengkapi data Anda di Resume Builder.</li>
                                <li>Unduh CV ATS Anda.</li>
                                <li>Riwayat otomatis terupdate di halaman ini.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

