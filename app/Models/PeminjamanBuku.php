<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;

    protected $table = "peminjaman_buku";

    protected $fillable = [
        "nim",
        "nama_mahasiswa",
        "buku_id",
        "tanggal_peminjaman",
        "tanggal_pengembalian",
        "no_hp",
        "no_darurat",
        "nama_penjaga",
    ];

    public function buku() {
        return $this->belongsTo(Buku::class);
    }
}
