<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanSkripsi extends Model
{
    use HasFactory;

    protected $table = "peminjaman_skripsi";

    protected $fillable = [
        "nim",
        "nama_mahasiswa",
        "skripsi_id",
        "tanggal_peminjaman",
        "tanggal_pengembalian",
        "no_hp",
        "no_darurat",
        "nama_penjaga",
    ];

    public function skripsi()
    {
        return $this->belongsTo(Skripsi::class);
    }
}
