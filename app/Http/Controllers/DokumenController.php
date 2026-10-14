<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::latest()->get();
        return view('dokumen', compact('dokumens'));
    }
}
