<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $table = "peminjaman";

    protected $fillable = [
        "kode_peminjaman",
        "nim",
        "nama_mahasiswa",
        "jumlah_buku_dipinjam",
        "tanggal_peminjaman",
        "tanggal_pengembalian",
        "no_hp",
        "no_darurat",
        "nama_penjaga",
    ];
}
