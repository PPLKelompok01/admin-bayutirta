<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['nama_layanan',
     'harga_terendah',
     'harga_tertinggi',
     'merk_hp',
     'status','keterangan',
     'foto',
     'created_at',
     'updated_at'];
}
