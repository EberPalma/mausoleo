<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condolencia extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'condolencias';
    protected $fillable = [
        'idifunto',
        'nombre',
        'email',
        'relacion',
        'mensaje',
        'verificado',
        'activo',
        'created_at'
    ];
}
