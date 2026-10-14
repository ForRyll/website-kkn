<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Anggota</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">{{ session('success') }}</div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Total: {{ $anggotas->count() }} anggota</p>
                    <a href="{{ route('anggota.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
                        + Tambah Anggota
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @forelse ($anggotas as $anggota)
                    <div class="border rounded-lg p-4 text-center">
                        @if ($anggota->foto)
                            <img src="{{ asset('uploads/anggota/' . $anggota->foto) }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-2">
                        @else
                            <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-2">
                                <span class="text-2xl text-gray-400">👤</span>
                            </div>
                        @endif
                        <p class="font-medium text-sm text-gray-800">{{ $anggota->nama }}</p>
                        <p class="text-xs text-blue-600 mb-1">{{ $anggota->jabatan }}</p>
                        <p class="text-xs text-gray-400 mb-3">{{ $anggota->jurusan ?? '-' }}</p>
                        <div class="flex justify-center gap-3 text-xs">
                            <a href="{{ route('anggota.edit', $anggota->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-4 text-center text-gray-400 py-6">Belum ada data anggota.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
