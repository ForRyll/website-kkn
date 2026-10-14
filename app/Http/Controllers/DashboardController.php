<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Umkm;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProgram = ProgramKerja::count();
        $jumlahBerita = Berita::count();
        $jumlahGaleri = Galeri::count();
        $jumlahUmkm = Umkm::count();
        $jumlahAnggota = Anggota::count();

        return view('dashboard', compact(
            'jumlahProgram', 'jumlahBerita', 'jumlahGaleri', 'jumlahUmkm', 'jumlahAnggota'
        ));
    }
}
