<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'kategori', 'tanggal_kegiatan', 'gambar', 'status'
    ];
}
