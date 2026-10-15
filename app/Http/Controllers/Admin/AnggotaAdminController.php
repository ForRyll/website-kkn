<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaAdminController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::latest()->get();
        return view('admin.anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $namaFile = $request->file('foto')->hashName();
            $request->file('foto')->move(public_path('uploads/anggota'), $namaFile);
            $data['foto'] = $namaFile;
        }

        Anggota::create($data);

        return redirect('/admin/anggota')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(Anggota $anggota)
    {
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($anggota->foto) {
                $fileLama = public_path('uploads/anggota/' . $anggota->foto);
                if (file_exists($fileLama)) unlink($fileLama);
            }
            $namaFile = $request->file('foto')->hashName();
            $request->file('foto')->move(public_path('uploads/anggota'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $anggota->update($data);

        return redirect('/admin/anggota')->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy(Anggota $anggota)
    {
        if ($anggota->foto) {
            $fileLama = public_path('uploads/anggota/' . $anggota->foto);
            if (file_exists($fileLama)) unlink($fileLama);
        }

        $anggota->delete();
        return redirect('/admin/anggota')->with('success', 'Anggota berhasil dihapus!');
    }
}
