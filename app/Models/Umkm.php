<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama_usaha', 'pemilik', 'deskripsi', 'kontak', 'gambar', 'alamat'
    ];
}
