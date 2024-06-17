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
        Schema::create('skripsi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('kode_skripsi');
            $table->string('kelompok_keahlian');
            $table->string('judul_skripsi');
            $table->string('nama_penulis');
            $table->string('dosen_pembimbing');
            $table->date('tahun_rilis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsi');
    }
};
