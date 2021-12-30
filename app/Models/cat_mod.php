<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_mod extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'cat_mod';
    protected $fillable = [
        'posicion',
        'nombre',
        'tipo',
        'url',
        'url_alias',
        'creado',
        'modificado',
        'modulo',
        'icono',
        'activo',
        'id_superior'
    ];
}
