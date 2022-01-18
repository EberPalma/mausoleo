<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    public function store(Request $request){
        $beneficiario = \DB::table('beneficiarios')->insert([
            'idNicho' => $request->idNicho,
            'nombre' => $request->nombre,
            'fechaNacimiento' => $request->fechaNacimiento,
            'fechaDefuncion' => $request->fechaDefuncion,
            'mensaje' => $request->mensaje,
            'activo' => 1,
            'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
