<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $galeris = $query->latest()->paginate(12)->withQueryString();
        $categories = Galeri::select('kategori')->distinct()->pluck('kategori');

        return view('galeri', compact('galeris', 'categories'));
    }
}
