<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contratos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'contratos';
    protected $fillable = [
        'id_unidad',
        'id_nicho',
        'id_cliente',
        'id_tipo_contrato',
        'id_estado_contrato',
        'id_vendedor',
        'id_modalidad',
        'id_metodo',
        'id_contrato_org',
        'contrato',
        'fecha_compra',
        'descuento',
        'total',
        'costo_original',
        'mensualidad',
        'penalizacion',
        'observaciones',
        'unidad_cobro',
        'vendedor',
        'placa_fam',
        'religion',
        'facturado',
        'factura',
        'fecha_aux',
        'p_inden_oficial',
        'p_iden_laboral',
        'p_comprobante',
        'mottivo_cancelacion',
        'meses',
        'enganche',
        'apartado'
    ];
}
