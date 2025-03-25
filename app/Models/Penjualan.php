<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'judul',
        'Kategori',
        'harga',
        'stok',
        'deskripsi',
        'foto',
        'created_at',
        'updated_at'
    ];
}
