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
        Schema::create('data_bukus', function (Blueprint $table) {
            $table -> id();
            $table -> string ('isbn') -> unique;
            $table -> string ('judul');
            $table -> string ('nama_pengarang');
            $table -> date ('tanggal_terbit');
            $table -> enum ('status',['Tersedia' , 'Dipinjam']);
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_bukus');
    }
};
