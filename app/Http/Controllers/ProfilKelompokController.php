<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class ProfilKelompokController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();
        return view('profil-kelompok', compact('anggotas'));
    }
}
