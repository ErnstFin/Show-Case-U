@extends('layouts.admin')

@section('header', 'Pengaturan Sistem')

@section('content')
    <div class="max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Pengaturan Umum</h3>
            
            <form action="#" method="POST">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="app_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Aplikasi</label>
                        <input type="text" id="app_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="Show Case U" required>
                    </div>
                    <div>
                        <label for="admin_email" class="block mb-2 text-sm font-medium text-gray-900">Email Admin</label>
                        <input type="email" id="admin_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="admin@showcaseu.com" required>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Aktifkan Notifikasi Email</span>
                    </label>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection