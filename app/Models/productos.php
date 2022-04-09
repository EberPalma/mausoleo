<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'titulo',
        'cantidad',
        'descripcion',
        'existencias',
        'precio',
        'oferta',
        'porcentaje_oferta'
    ];
}
