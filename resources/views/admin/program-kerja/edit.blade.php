<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Program Kerja
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-6">

                <form action="{{ route('program-kerja.update', $programKerja->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $programKerja->judul) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm @error('judul') border-red-500 @enderror">
                        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                                  class="w-full border rounded-lg px-3 py-2 text-sm @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $programKerja->deskripsi) }}</textarea>
                        @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="kategori" class="w-full border rounded-lg px-3 py-2 text-sm">
                                @foreach (['Pendidikan','Kesehatan','Lingkungan','Ekonomi','Sosial','Lainnya'] as $kat)
                                    <option value="{{ $kat }}" {{ $programKerja->kategori == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="w-full border rounded-lg px-3 py-2 text-sm">
                                @foreach (['Direncanakan','Berlangsung','Selesai'] as $st)
                                    <option value="{{ $st }}" {{ $programKerja->status == $st ? 'selected' : '' }}>{{ $st }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan', $programKerja->tanggal_kegiatan) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
                            Update
                        </button>
                        <a href="{{ route('program-kerja.index') }}" class="border px-5 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
