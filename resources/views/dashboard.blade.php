<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin — KKN Kelompok 125
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- SAPAAN -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Halo, {{ Auth::user()->name }} 👋</h3>
                <p class="text-gray-500 text-sm mt-1">Kelola seluruh konten website KKN Kelompok 125 dari sini.</p>
            </div>

            <!-- KARTU STATISTIK -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
                <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                    <p class="text-3xl font-bold text-blue-700">{{ $jumlahProgram }}</p>
                    <p class="text-gray-500 text-sm mt-1">Program Kerja</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                    <p class="text-3xl font-bold text-green-700">{{ $jumlahBerita }}</p>
                    <p class="text-gray-500 text-sm mt-1">Berita</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                    <p class="text-3xl font-bold text-red-700">{{ $jumlahGaleri }}</p>
                    <p class="text-gray-500 text-sm mt-1">Foto Galeri</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                    <p class="text-3xl font-bold text-blue-700">{{ $jumlahUmkm }}</p>
                    <p class="text-gray-500 text-sm mt-1">UMKM</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                    <p class="text-3xl font-bold text-green-700">{{ $jumlahAnggota }}</p>
                    <p class="text-gray-500 text-sm mt-1">Anggota</p>
                </div>
            </div>

            <!-- MENU CEPAT -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelola Konten</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="{{ url('/admin/program-kerja') }}" class="border rounded-lg p-4 hover:bg-gray-50 hover:border-blue-400 transition">
                        <p class="font-medium text-gray-800">📋 Program Kerja</p>
                        <p class="text-xs text-gray-500">Tambah / edit / hapus</p>
                    </a>
                    <a href="{{ url('/admin/berita') }}" class="border rounded-lg p-4 hover:bg-gray-50 hover:border-blue-400 transition">
                        <p class="font-medium text-gray-800">📰 Berita</p>
                        <p class="text-xs text-gray-500">Tambah / edit / hapus</p>
                    </a>
                    <a href="{{ url('/admin/galeri') }}" class="border rounded-lg p-4 hover:bg-gray-50 hover:border-blue-400 transition">
                        <p class="font-medium text-gray-800">🖼️ Galeri</p>
                        <p class="text-xs text-gray-500">Tambah / edit / hapus</p>
                    </a>
                    <a href="{{ url('/admin/umkm') }}" class="border rounded-lg p-4 hover:bg-gray-50 hover:border-blue-400 transition">
                        <p class="font-medium text-gray-800">🛍️ UMKM</p>
                        <p class="text-xs text-gray-500">Tambah / edit / hapus</p>
                    </a>
                    <a href="{{ url('/admin/anggota') }}" class="border rounded-lg p-4 hover:bg-gray-50 hover:border-blue-400 transition">
                        <p class="font-medium text-gray-800">👥 Anggota</p>
                        <p class="text-xs text-gray-500">Tambah / edit / hapus</p>
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="border rounded-lg p-4 hover:bg-gray-50 hover:border-green-400 transition">
                        <p class="font-medium text-gray-800">🌐 Lihat Website</p>
                        <p class="text-xs text-gray-500">Buka tampilan publik</p>
                    </a>
                    <a href="{{ url('/admin/dokumen') }}" class="border rounded-lg p-4 hover:bg-gray-50 hover:border-blue-400 transition">
                        <p class="font-medium text-gray-800">📄 Dokumen</p>
                        <p class="text-xs text-gray-500">Upload / hapus dokumen</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
