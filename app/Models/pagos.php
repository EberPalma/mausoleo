<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'pagos';
    protected $fillable = [
        'id_usuario',
        'id_recibo',
        'id_nicho',
        'id_cliente',
        'id_estado_pago',
        'id_contrato',
        'id_tipo_pago',
        'anio',
        'descuento',
        'costo',
        'concepto',
        'fecha_pago',
        'fecha_vencimiento',
        'fecha_aux'
    ];
}
