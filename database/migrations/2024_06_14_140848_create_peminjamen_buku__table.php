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
        Schema::create('peminjaman_buku', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('nim');
            $table->foreignId('buku_id');
            $table->string('nama_mahasiswa');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('no_hp');
            $table->string('no_darurat');
            $table->string('nama_penjaga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_buku');
    }
};
