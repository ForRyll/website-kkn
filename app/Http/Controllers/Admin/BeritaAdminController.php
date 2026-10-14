<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaAdminController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tempat' => 'nullable|string|max:255',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/berita'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        Berita::create($data);
        return redirect('/admin/berita')->with('success', 'Berita berhasil ditambahkan!');
    }

public function edit($id)
{
    $berita = Berita::findOrFail($id);
    return view('admin.berita.edit', compact('berita'));
}

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tempat' => 'nullable|string|max:255',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                $fileLama = public_path('uploads/berita/' . $berita->gambar);
                if (file_exists($fileLama)) unlink($fileLama);
            }
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/berita'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        $berita->update($data);
        return redirect('/admin/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            $fileLama = public_path('uploads/berita/' . $berita->gambar);
            if (file_exists($fileLama)) unlink($fileLama);
        }
        $berita->delete();
        return redirect('/admin/berita')->with('success', 'Berita berhasil dihapus!');
    }


    public function updateById(Request $request, $id)
{
    $berita = Berita::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'penulis' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'tempat' => 'nullable|string|max:255',
    ]);

    $data = $request->except('gambar');

    if ($request->hasFile('gambar')) {
        if ($berita->gambar) {
            $fileLama = public_path('uploads/berita/' . $berita->gambar);
            if (file_exists($fileLama)) unlink($fileLama);
        }
        $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('uploads/berita'), $namaFile);
        $data['gambar'] = $namaFile;
    }

    $berita->update($data);
    return redirect('/admin/berita')->with('success', 'Berita berhasil diperbarui!');
}

}
