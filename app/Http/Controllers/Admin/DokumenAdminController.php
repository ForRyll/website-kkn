<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenAdminController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::latest()->paginate(10);
        return view('admin.dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        return view('admin.dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
            'kategori' => 'required|in:Laporan,Proposal,Surat,Lainnya',
            'file' => 'required|mimes:pdf,doc,docx|max:5120',
        ]);

        $namaFile = $request->file('file')->hashName();
        $request->file('file')->move(public_path('uploads/dokumen'), $namaFile);

        Dokumen::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'file' => $namaFile,
        ]);

        return redirect('/admin/dokumen')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function destroy(Dokumen $dokumen)
    {
        $fileLama = public_path('uploads/dokumen/' . $dokumen->file);
        if (file_exists($fileLama)) unlink($fileLama);

        $dokumen->delete();
        return redirect('/admin/dokumen')->with('success', 'Dokumen berhasil dihapus!');
    }
}
