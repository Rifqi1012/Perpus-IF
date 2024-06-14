<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skripsi extends Model
{
    use HasFactory;

    protected $table = 'skripsi';

    protected $fillable = [
        'kode_skripsi',
        'kelompok_keahlian',
        'judul_skripsi',
        'nama_penulis',
        'dosen_pembimbing',
        'tahun_rilis',
    ];
}
