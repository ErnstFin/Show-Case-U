@extends('layouts.admin')

@section('header', 'Verifikasi Portofolio')

@section('content')
    
    <div class="flex space-x-1 bg-gray-200 p-1 rounded-lg w-fit mb-6">
        <button class="px-4 py-1.5 bg-white text-gray-800 text-sm font-medium rounded-md shadow-sm">Semua</button>
        <button class="px-4 py-1.5 text-gray-600 hover:text-gray-800 text-sm font-medium rounded-md hover:bg-gray-50 transition">Menunggu</button>
        <button class="px-4 py-1.5 text-gray-600 hover:text-gray-800 text-sm font-medium rounded-md hover:bg-gray-50 transition">Disetujui</button>
        <button class="px-4 py-1.5 text-gray-600 hover:text-gray-800 text-sm font-medium rounded-md hover:bg-gray-50 transition">Ditolak</button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Judul Portofolio</th>
                        <th scope="col" class="px-6 py-3">Mahasiswa</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Tanggal Upload</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Item 1: Pending (Perlu Aksi) --}}
                    <tr class="bg-white border-b hover:bg-gray-50 border-l-4 border-l-orange-300">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            Redesign Aplikasi Mobile Banking
                        </td>
                        <td class="px-6 py-4">Budi Santoso</td>
                        <td class="px-6 py-4">UI/UX Design</td>
                        <td class="px-6 py-4">Baru Saja</td>
                        <td class="px-6 py-4">
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded border border-orange-200 flex items-center w-fit gap-1">
                                <i data-lucide="clock" class="w-3 h-3"></i> Menunggu
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button title="Lihat Detail" class="p-1.5 bg-gray-100 text-gray-600 rounded hover:bg-gray-200">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                                <button title="Terima" class="p-1.5 bg-green-100 text-green-600 rounded hover:bg-green-200">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                </button>
                                <button title="Tolak" class="p-1.5 bg-red-100 text-red-600 rounded hover:bg-red-200">
                                    <i data-lucide="x" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Item 2: Approved --}}
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            Website Company Profile UMKM
                        </td>
                        <td class="px-6 py-4">Siti Aminah</td>
                        <td class="px-6 py-4">Web Development</td>
                        <td class="px-6 py-4">28 Nov 2025</td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-200 flex items-center w-fit gap-1">
                                <i data-lucide="check-circle" class="w-3 h-3"></i> Disetujui
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-blue-600 hover:underline text-xs">Lihat Detail</button>
                        </td>
                    </tr>

                    {{-- Item 3: Rejected --}}
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            Logo Brand Kopi
                        </td>
                        <td class="px-6 py-4">Joko Anwar</td>
                        <td class="px-6 py-4">Graphic Design</td>
                        <td class="px-6 py-4">27 Nov 2025</td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded border border-red-200 flex items-center w-fit gap-1">
                                <i data-lucide="x-circle" class="w-3 h-3"></i> Ditolak
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-blue-600 hover:underline text-xs">Lihat Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection