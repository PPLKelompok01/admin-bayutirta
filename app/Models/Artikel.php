<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'judul',
        'nama_penulis',
        'title_penulis',
        'isi',
        'foto',
        'created_at',
        'updated_at'
    ];
}
