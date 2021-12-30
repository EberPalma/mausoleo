<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nichos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'nichos';
    protected $fillable = [
        'id_cliente',
        'id_tipo_nicho',
        'id_nivel',
        'numero',
        'capacidad',
        'id_ubicacion',
        'bpreregistro'
    ];
}
