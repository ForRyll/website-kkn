<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%")
                  ->orWhere('tempat', 'like', "%{$search}%");
            });
        }

        if ($request->filled('penulis')) {
            $query->where('penulis', $request->penulis);
        }

        $beritas = $query->latest()->paginate(6)->withQueryString();
        $penulisList = Berita::select('penulis')->distinct()->pluck('penulis');

        return view('berita', compact('beritas', 'penulisList'));
    }
}
