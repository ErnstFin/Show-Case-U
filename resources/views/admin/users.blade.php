@extends('layouts.admin')

@section('header', 'Data Pengguna')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="relative w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Cari pengguna...">
            </div>

            <button class="w-full sm:w-auto bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition flex items-center justify-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Pengguna
            </button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Bergabung</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Dummy User 1 (Admin) --}}
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">
                                AD
                            </div>
                            <span class="font-medium text-gray-900">Admin Utama</span>
                        </td>
                        <td class="px-6 py-4">admin@showcaseu.com</td>
                        <td class="px-6 py-4">
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded border border-purple-200">Admin</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Aktif
                            </div>
                        </td>
                        <td class="px-6 py-4">20 Okt 2023</td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-gray-400 hover:text-blue-600 mx-1"><i data-lucide="edit" class="w-4 h-4"></i></button>
                        </td>
                    </tr>

                    {{-- Dummy User 2 (Mahasiswa) --}}
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 font-bold text-xs">
                                BS
                            </div>
                            <span class="font-medium text-gray-900">Budi Santoso</span>
                        </td>
                        <td class="px-6 py-4">budi.s@student.com</td>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded border border-gray-200">User</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Aktif
                            </div>
                        </td>
                        <td class="px-6 py-4">22 Okt 2023</td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-gray-400 hover:text-blue-600 mx-1"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="text-gray-400 hover:text-red-600 mx-1"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                        </td>
                    </tr>

                    {{-- Dummy User 3 (Inactive) --}}
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 font-bold text-xs">
                                SA
                            </div>
                            <span class="font-medium text-gray-900">Siti Aminah</span>
                        </td>
                        <td class="px-6 py-4">siti.am@gmail.com</td>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded border border-gray-200">User</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Non-Aktif
                            </div>
                        </td>
                        <td class="px-6 py-4">25 Okt 2023</td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-gray-400 hover:text-blue-600 mx-1"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="text-gray-400 hover:text-red-600 mx-1"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-4 border-t border-gray-100 flex justify-between items-center text-sm text-gray-500">
            <span>Menampilkan 1-3 dari 120 pengguna</span>
            <div class="flex gap-1">
                <button class="px-3 py-1 border rounded hover:bg-gray-50">Prev</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>
@endsection