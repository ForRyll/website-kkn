<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Dokumen</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">{{ session('success') }}</div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Total: {{ $dokumens->total() }} dokumen</p>
                    <a href="{{ route('dokumen.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
                        + Upload Dokumen
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="px-4 py-3">Judul</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3">File</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse ($dokumens as $dokumen)
                            <tr>
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $dokumen->judul }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $dokumen->kategori }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{ asset('uploads/dokumen/' . $dokumen->file) }}" target="_blank" class="text-blue-600 hover:underline text-xs">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $dokumen->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-3 text-right">
                                    <form action="{{ route('dokumen.destroy', $dokumen->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada dokumen.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                <div class="mt-6">
                    {{ $dokumens->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
