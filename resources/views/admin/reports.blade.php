@extends('layouts.admin')

@section('header', 'Laporan & Statistik')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 h-64 flex flex-col items-center justify-center text-center">
            <div class="bg-blue-50 p-4 rounded-full mb-3">
                <i data-lucide="bar-chart-2" class="w-8 h-8 text-blue-500"></i>
            </div>
            <h4 class="font-semibold text-gray-700">Statistik Pengunjung</h4>
            <p class="text-sm text-gray-500">Grafik kunjungan per bulan akan tampil di sini.</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 h-64 flex flex-col items-center justify-center text-center">
             <div class="bg-orange-50 p-4 rounded-full mb-3">
                <i data-lucide="pie-chart" class="w-8 h-8 text-orange-500"></i>
            </div>
            <h4 class="font-semibold text-gray-700">Kategori Portofolio</h4>
            <p class="text-sm text-gray-500">Persentase kategori portofolio akan tampil di sini.</p>
        </div>
    </div>

    <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-gray-800 mb-4">Unduh Laporan Bulanan</h3>
        <ul class="space-y-3">
            <li class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="text-sm font-medium text-gray-700">Laporan Oktober 2023.pdf</span>
                <button class="text-blue-600 text-sm hover:underline">Unduh</button>
            </li>
            <li class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="text-sm font-medium text-gray-700">Laporan September 2023.pdf</span>
                <button class="text-blue-600 text-sm hover:underline">Unduh</button>
            </li>
        </ul>
    </div>
@endsection