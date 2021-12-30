<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_nivel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'cat_nivel';
    protected $fillable = [
        'id_capacidad',
        'nombre',
        'precio',
        'enganche',
        'mensualidad'
    ];
}
