<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_acceso extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'log_acceso';
    protected $fillable = [
        'username',
        'nombre_completo',
        'dfecha_visita',
        'id_rol',
        'id_usu',
        'session'
    ];
}
