<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    use HasFactory;
    protected $fillable = ['isbn','judul','nama_pengarang','tanggal_terbit','status'];
}
