<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola UMKM</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">{{ session('success') }}</div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Total: {{ $umkms->total() }} UMKM</p>
                    <a href="{{ route('umkm.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
                        + Tambah UMKM
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="px-4 py-3">Nama Usaha</th>
                                <th class="px-4 py-3">Pemilik</th>
                                <th class="px-4 py-3">Kontak</th>
                                <th class="px-4 py-3">Alamat</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse ($umkms as $umkm)
                            <tr>
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $umkm->nama_usaha }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $umkm->pemilik }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $umkm->kontak ?? '-' }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $umkm->alamat ?? '-' }}</td>
                                <td class="px-4 py-3 text-right space-x-2">
                                    <a href="{{ route('umkm.edit', $umkm->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('umkm.destroy', $umkm->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus UMKM ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada data UMKM.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                <div class="mt-6">
                    {{ $umkms->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
