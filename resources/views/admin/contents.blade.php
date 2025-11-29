@extends('layouts.admin')

@section('header', 'Konten & Informasi')

@section('content')
    <div class="mb-6 flex justify-end">
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 hover:bg-blue-700">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Berita
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
            <div class="h-40 bg-gray-200 flex items-center justify-center text-gray-400">
                <i data-lucide="image" class="w-10 h-10"></i>
            </div>
            <div class="p-5">
                <span class="text-xs font-semibold text-blue-600 uppercase">Pengumuman</span>
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 group-hover:text-blue-600 transition">Jadwal Maintenance Sistem</h5>
                <p class="mb-3 font-normal text-gray-500 text-sm">Sistem akan melakukan pemeliharaan pada tanggal 25 Oktober...</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-xs text-gray-400">20 Okt 2023</span>
                    <button class="text-gray-500 hover:text-blue-600"><i data-lucide="edit-3" class="w-4 h-4"></i></button>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
            <div class="h-40 bg-gray-200 flex items-center justify-center text-gray-400">
                <i data-lucide="image" class="w-10 h-10"></i>
            </div>
            <div class="p-5">
                <span class="text-xs font-semibold text-green-600 uppercase">Tips</span>
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 group-hover:text-blue-600 transition">Cara Membuat Portofolio Menarik</h5>
                <p class="mb-3 font-normal text-gray-500 text-sm">Berikut adalah 5 tips agar portofolio kamu dilirik perusahaan...</p>
                 <div class="flex justify-between items-center mt-4">
                    <span class="text-xs text-gray-400">18 Okt 2023</span>
                    <button class="text-gray-500 hover:text-blue-600"><i data-lucide="edit-3" class="w-4 h-4"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection