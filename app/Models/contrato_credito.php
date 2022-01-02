<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contrato_credito extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'contrato_credito';
    protected $fillable = [
        'id_contrato',
        'costo_mensual',
        'fecha_pago',
    ];
}
