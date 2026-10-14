<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaAdminController extends Controller
{
    // Tampilkan semua data (tabel admin)
    public function index()
    {
        $programs = ProgramKerja::latest()->get();
        return view('admin.program-kerja.index', compact('programs'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('admin.program-kerja.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Pendidikan,Kesehatan,Lingkungan,Ekonomi,Sosial,Lainnya',
            'tanggal_kegiatan' => 'nullable|date',
            'status' => 'required|in:Direncanakan,Berlangsung,Selesai',
        ]);

        ProgramKerja::create($request->all());

        return redirect('/admin/program-kerja')->with('success', 'Program kerja berhasil ditambahkan!');
    }

    // Tampilkan form edit
    public function edit(ProgramKerja $programKerja)
    {
        return view('admin.program-kerja.edit', compact('programKerja'));
    }

    // Update data
    public function update(Request $request, ProgramKerja $programKerja)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Pendidikan,Kesehatan,Lingkungan,Ekonomi,Sosial,Lainnya',
            'tanggal_kegiatan' => 'nullable|date',
            'status' => 'required|in:Direncanakan,Berlangsung,Selesai',
        ]);

        $programKerja->update($request->all());

        return redirect('/admin/program-kerja')->with('success', 'Program kerja berhasil diperbarui!');
    }

    // Hapus data
    public function destroy(ProgramKerja $programKerja)
    {
        $programKerja->delete();
        return redirect('/admin/program-kerja')->with('success', 'Program kerja berhasil dihapus!');
    }
}
