<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_clientes extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'rfc',
        'calle',
        'no_exterior',
        'no_interior',
        'colonia',
        'delegacion',
        'ciudad',
        'estado',
        'codigo_postal',
        'email',
        'email_alternativo',
        'telefono',
        'tel_trabajo',
        'tel_adicional',
        'celular',
        'cel_adicional',
        'bactivo'
    ];
}
