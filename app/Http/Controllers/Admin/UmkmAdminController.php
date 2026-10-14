<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmAdminController extends Controller
{
    public function index()
    {
        $umkms = Umkm::latest()->get();
        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kontak' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/umkm'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        Umkm::create($data);
        return redirect('/admin/umkm')->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kontak' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($umkm->gambar) {
                $fileLama = public_path('uploads/umkm/' . $umkm->gambar);
                if (file_exists($fileLama)) unlink($fileLama);
            }
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/umkm'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        $umkm->update($data);
        return redirect('/admin/umkm')->with('success', 'UMKM berhasil diperbarui!');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->gambar) {
            $fileLama = public_path('uploads/umkm/' . $umkm->gambar);
            if (file_exists($fileLama)) unlink($fileLama);
        }
        $umkm->delete();
        return redirect('/admin/umkm')->with('success', 'UMKM berhasil dihapus!');
    }
}
