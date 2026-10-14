<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit UMKM</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-6">

                @if($umkm->gambar)
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Foto saat ini:</p>
                    <img src="{{ asset('uploads/umkm/' . $umkm->gambar) }}" class="w-40 h-28 object-cover rounded-lg border">
                </div>
                @endif

                <form action="{{ route('umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Usaha</label>
                        <input type="text" name="nama_usaha" value="{{ old('nama_usaha', $umkm->nama_usaha) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('nama_usaha') border-red-500 @enderror">
                        @error('nama_usaha') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pemilik</label>
                        <input type="text" name="pemilik" value="{{ old('pemilik', $umkm->pemilik) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('pemilik') border-red-500 @enderror">
                        @error('pemilik') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                                  class="w-full border rounded-lg px-3 py-2 text-sm">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kontak (opsional)</label>
                            <input type="text" name="kontak" value="{{ old('kontak', $umkm->kontak) }}"
                                   class="w-full border rounded-lg px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat (opsional)</label>
                            <input type="text" name="alamat" value="{{ old('alamat', $umkm->alamat) }}"
                                   class="w-full border rounded-lg px-3 py-2 text-sm">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto (opsional)</label>
                        <input type="file" name="gambar" accept="image/*"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                        <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengganti foto</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">Update</button>
                        <a href="{{ route('umkm.index') }}" class="border px-5 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
