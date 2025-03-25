<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $fillable = [
        'judul',
        'cabang_perusahaan',
        'posisi',
        'deskripsi',
        'foto',
        'created_at',
        'updated_at'
    ];
}