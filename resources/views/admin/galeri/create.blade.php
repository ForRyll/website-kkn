<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Foto Galeri</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('judul') border-red-500 @enderror">
                        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" class="w-full border rounded-lg px-3 py-2 text-sm">
                            @foreach (['Kegiatan','Lingkungan','Masyarakat','Lainnya'] as $kat)
                                <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto</label>
                        <input type="file" name="gambar" accept="image/*"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('gambar') border-red-500 @enderror">
                        <p class="text-xs text-gray-400 mt-1">Format JPG/PNG/WEBP, maksimal 2MB</p>
                        @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">Simpan</button>
                        <a href="{{ route('galeri.index') }}" class="border px-5 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
