<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah UMKM</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Usaha</label>
                        <input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('nama_usaha') border-red-500 @enderror">
                        @error('nama_usaha') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pemilik</label>
                        <input type="text" name="pemilik" value="{{ old('pemilik') }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('pemilik') border-red-500 @enderror">
                        @error('pemilik') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                                  class="w-full border rounded-lg px-3 py-2 text-sm @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kontak (opsional)</label>
                            <input type="text" name="kontak" value="{{ old('kontak') }}"
                                   class="w-full border rounded-lg px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat (opsional)</label>
                            <input type="text" name="alamat" value="{{ old('alamat') }}"
                                   class="w-full border rounded-lg px-3 py-2 text-sm">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk (opsional)</label>
                        <input type="file" name="gambar" accept="image/*"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                        <p class="text-xs text-gray-400 mt-1">Format JPG/PNG/WEBP, maksimal 2MB</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">Simpan</button>
                        <a href="{{ route('umkm.index') }}" class="border px-5 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
