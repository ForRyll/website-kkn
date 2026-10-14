<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('umkms', function (Blueprint $table) {
        $table->id();
        $table->string('nama_usaha');
        $table->string('pemilik');
        $table->text('deskripsi');
        $table->string('kontak')->nullable();
        $table->string('gambar')->nullable();
        $table->string('alamat')->nullable();
        $table->timestamps();
    });
}
};
