<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recibos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'recibos';
    protected $fillable = [
        'id_usuario',
        'id_cliente',
        'id_nicho',
        'id_medoto_pago',
        'total_sin_descuento',
        'descuento',
        'subtotal',
        'iva',
        'total',
        'fecha_aux'
    ];
}
