@extends('layouts.admin')

@section('header', 'Dashboard Overview')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-400">
            <p class="text-gray-500 text-sm">Total Pengguna</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $total_users }}</h3>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-orange-300">
            <p class="text-gray-500 text-sm">Portofolio Masuk</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $portfolios }}</h3>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-gray-400">
            <p class="text-gray-500 text-sm">Mitra Perusahaan</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $companies }}</h3>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm">
        <h3 class="text-lg font-bold mb-4">Selamat Datang, Admin!</h3>
        <p class="text-gray-600">
            Ini adalah panel admin untuk mengelola aplikasi Show Case U. 
            Silakan pilih menu di sebelah kiri untuk mulai mengelola data.
        </p>
    </div>
@endsection