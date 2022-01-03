<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class huespedes extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'huespedes';
    protected $fillable = [
        'id_contrato',
        'id_nicho',
        'bcenizas',
        'nombre',
        'fecha_nacimiento',
        'fecha_defuncion',
        'fecha_ingreso',
        'fecha_na_aux',
        'fecha_aux2',
        'fecha_aux3'
    ];
}
