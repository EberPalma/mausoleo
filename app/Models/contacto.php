<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'contacto';
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'asunto',
        'mensaje',
        'atendido',
        'activo'
    ];
}
