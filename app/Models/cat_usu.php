<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_usu extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'cat_usu';
    protected $fillable = [
        'username',
        'password',
        'nombre',
        'ap_paterno',
        'ap_materno',
        'id_rol',
        'fecha_creado',
        'ultima_visita',
        'borrado'
    ];
}
