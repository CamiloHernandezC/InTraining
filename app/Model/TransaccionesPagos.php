<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransaccionesPagos extends Model
{
    protected $table = 'transacciones_pagos';

    protected $fillable = [
        'ref_payco','codigo_respuesta','respuesta','data', 'id_solicitud_servicio', 'id_propuesta'
    ];

}
