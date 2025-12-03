@extends('main')

@section('content')
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600 mb-8">Dashboard Manajemen Perpustakaan</p>
        <!-- Konten dashboard akan ditambahkan di sini -->
    </div>
@endsection
