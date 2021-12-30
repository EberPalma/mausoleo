<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_rol extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'cat_rol';
    protected $fillable = [
        'nombre',
        'nivel',
        'redirect',
        'activo',
        'creado',
        'modificado'
    ];
}
