<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_vendedores extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'cat_vendedores';
    protected $fillable = [
        'aux',
        'nombre',
        'fecha_ingreso',
        'bactivo'
    ];
}
