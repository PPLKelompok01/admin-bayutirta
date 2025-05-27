<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    
    protected $table = 'konsultasis';
    
    protected $fillable = [
        'user_id',
        'kategori',
        'perangkat',
        'masalah',
        'foto',
        'urgensi',
        'status',
        'jawaban',
        'jawaban_at'
    ];
    
    protected $casts = [
        'jawaban_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(KonsultasiUser::class, 'user_id');
    }
}