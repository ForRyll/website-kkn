<?php

namespace App\Http\Controllers;

use App\Models\Umkm;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::latest()->get();
        return view('umkm', compact('umkms'));
    }
}
