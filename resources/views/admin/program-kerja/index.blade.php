<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Program Kerja
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Total: {{ $programs->total() }} program kerja</p>
                    <a href="{{ route('program-kerja.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
                        + Tambah Program Kerja
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="px-4 py-3">Judul</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse ($programs as $program)
                            <tr>
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $program->judul }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $program->kategori }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs
                                        {{ $program->status == 'Selesai' ? 'bg-green-100 text-green-700' : ($program->status == 'Berlangsung' ? 'bg-blue-100 text-blue-700' : 'bg-red-100 text-red-700') }}">
                                        {{ $program->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    {{ $program->tanggal_kegiatan ? \Carbon\Carbon::parse($program->tanggal_kegiatan)->format('d M Y') : '-' }}
                                </td>
                                <td class="px-4 py-3 text-right space-x-2">
                                    <a href="{{ route('program-kerja.edit', $program->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('program-kerja.destroy', $program->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus program kerja ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada data program kerja.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                <div class="mt-6">
                    {{ $programs->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
