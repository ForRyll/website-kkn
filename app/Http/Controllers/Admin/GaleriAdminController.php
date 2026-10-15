<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriAdminController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Kegiatan,Lingkungan,Masyarakat,Lainnya',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaFile = $request->file('gambar')->hashName();
        $request->file('gambar')->move(public_path('uploads/galeri'), $namaFile);

        Galeri::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'gambar' => $namaFile,
        ]);

        return redirect('/admin/galeri')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Kegiatan,Lingkungan,Masyarakat,Lainnya',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama kalau ada
            $fileLama = public_path('uploads/galeri/' . $galeri->gambar);
            if (file_exists($fileLama)) {
                unlink($fileLama);
            }

            $namaFile = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('uploads/galeri'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        $galeri->update($data);

        return redirect('/admin/galeri')->with('success', 'Foto berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        $fileLama = public_path('uploads/galeri/' . $galeri->gambar);
        if (file_exists($fileLama)) {
            unlink($fileLama);
        }

        $galeri->delete();
        return redirect('/admin/galeri')->with('success', 'Foto berhasil dihapus!');
    }
}
