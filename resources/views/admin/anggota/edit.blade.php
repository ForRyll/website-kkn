<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Anggota</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-6">

                @if ($anggota->foto)
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Foto saat ini:</p>
                    <img src="{{ asset('uploads/anggota/' . $anggota->foto) }}" class="w-20 h-20 rounded-full object-cover border">
                </div>
                @endif

                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('nama') border-red-500 @enderror">
                        @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan', $anggota->jabatan) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('jabatan') border-red-500 @enderror">
                        @error('jabatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jurusan (opsional)</label>
                            <input type="text" name="jurusan" value="{{ old('jurusan', $anggota->jurusan) }}"
                                   class="w-full border rounded-lg px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Instagram (opsional)</label>
                            <input type="text" name="instagram" value="{{ old('instagram', $anggota->instagram) }}"
                                   placeholder="@username"
                                   class="w-full border rounded-lg px-3 py-2 text-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat (opsional)</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $anggota->alamat) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Motto Hidup (opsional)</label>
                        <input type="text" name="motto" value="{{ old('motto', $anggota->motto) }}"
                               placeholder="Motto hidup kamu..."
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto (opsional)</label>
                        <input type="file" name="foto" accept="image/*"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                        <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengganti foto</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">Update</button>
                        <a href="{{ route('anggota.index') }}" class="border px-5 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
