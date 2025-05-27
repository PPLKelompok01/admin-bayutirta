<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KonsultasiUser extends Model
{
    use HasFactory;
    
    protected $table = 'konsultasi_users';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    public function konsultasis()
    {
        return $this->hasMany(Konsultasi::class, 'user_id');
    }
} 