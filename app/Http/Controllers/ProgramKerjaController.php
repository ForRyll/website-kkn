<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    public function index()
    {
        $programs = ProgramKerja::latest()->get();
        return view('program-kerja', compact('programs'));
    }
}
