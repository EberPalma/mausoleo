<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avales extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'avales';
    protected $fillable = [
        'id_contrato',
        'nombre',
        'calle',
        'no_exterior',
        'no_interior',
        'colonia',
        'municipio',
        'ciudad',
        'estado',
        'codigo_postal',
        'parentesco',
        'email',
        'telefono',
        'bactivo',
        'orden',
        'id_cliente'
    ];
}
