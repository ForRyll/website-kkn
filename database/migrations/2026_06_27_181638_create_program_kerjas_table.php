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
    Schema::create('program_kerjas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('deskripsi');
        $table->enum('kategori', ['Pendidikan', 'Kesehatan', 'Lingkungan', 'Ekonomi', 'Sosial', 'Lainnya'])->default('Lainnya');
        $table->date('tanggal_kegiatan')->nullable();
        $table->string('gambar')->nullable();
        $table->enum('status', ['Direncanakan', 'Berlangsung', 'Selesai'])->default('Direncanakan');
        $table->timestamps();
    });
}
};
