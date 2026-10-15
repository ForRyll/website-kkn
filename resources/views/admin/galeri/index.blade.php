<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Galeri</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">{{ session('success') }}</div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Total: {{ $galeris->total() }} foto</p>
                    <a href="{{ route('galeri.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
                        + Tambah Foto
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @forelse ($galeris as $galeri)
                    <div class="border rounded-lg overflow-hidden">
                        <img src="{{ asset('uploads/galeri/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="w-full h-32 object-cover">
                        <div class="p-3">
                            <p class="text-xs text-blue-600 font-medium mb-1">{{ $galeri->kategori }}</p>
                            <p class="text-sm font-medium text-gray-800 truncate">{{ $galeri->judul }}</p>
                            <div class="flex justify-between mt-2 text-xs">
                                <a href="{{ route('galeri.edit', $galeri->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-4 text-center text-gray-400 py-6">Belum ada foto.</p>
                    @endforelse
                </div>

                <!-- PAGINATION -->
                <div class="mt-6">
                    {{ $galeris->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
