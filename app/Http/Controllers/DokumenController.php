<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = Dokumen::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $dokumens = $query->latest()->paginate(10)->withQueryString();

        return view('dokumen', compact('dokumens'));
    }
}
