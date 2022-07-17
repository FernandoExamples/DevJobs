<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'last_day',
        'descripcion',
        'imagen',
    ];
}
