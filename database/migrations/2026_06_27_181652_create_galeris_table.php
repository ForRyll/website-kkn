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
    Schema::create('galeris', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('gambar');
        $table->enum('kategori', ['Kegiatan', 'Lingkungan', 'Masyarakat', 'Lainnya'])->default('Lainnya');
        $table->timestamps();
    });
}
};
