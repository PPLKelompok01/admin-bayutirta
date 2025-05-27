<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectedUlasan extends Model
{
    protected $table = 'selected_ulasans';
    protected $primaryKey = 'id_ula san'; // Jika ingin menggunakan primary key custom
    protected $fillable = [
        'rating',
        'text', 
        'author_name',
        'id_displayed'
    ];
}