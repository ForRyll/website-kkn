<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Berita</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-6">

                @if($berita->gambar)
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Foto saat ini:</p>
                    <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" class="w-40 h-28 object-cover rounded-lg border">
                </div>
                @endif

               <form action="{{ url('admin/berita/' . $berita->id . '/update') }}" method="POST" enctype="multipart/form-data">
    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('judul') border-red-500 @enderror">
                        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                        <textarea name="isi" rows="6"
                                  class="w-full border rounded-lg px-3 py-2 text-sm">{{ old('isi', $berita->isi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
                        <input type="text" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Kegiatan (opsional)</label>
                        <input type="text" name="tempat" value="{{ old('tempat', $berita->tempat) }}"
                               placeholder="cth: Balai Desa Ciliang"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto (opsional)</label>
                        <input type="file" name="gambar" accept="image/*"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                        <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengganti foto</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">Update</button>
                        <a href="{{ route('berita.index') }}" class="border px-5 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50">Batal</a>
                    </div>
                    <p class="text-xs text-gray-400 mb-2">Action: {{ url('admin/berita/' . $berita->id . '/update') }}</p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
