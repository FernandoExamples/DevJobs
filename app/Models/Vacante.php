<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $dates = ['last_day'];

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

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }

    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
