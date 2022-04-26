<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Condolencia;
use Carbon\Carbon;

class CondolenciasController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'mensaje' => 'required',
            'relacion' => 'required',
        ]);

        $Condolencia = new Condolencia();
        $Condolencia-> idifunto = $request->idifunto;
        $Condolencia-> nombre = $request->nombre;
        $Condolencia-> email = $request->email;
        $Condolencia-> relacion = $request->relacion;
        $Condolencia-> mensaje = $request->mensaje;
        $Condolencia-> verificado = 0;
        $Condolencia-> activo = 1;
        //$Condolencia-> updated_at = Carbon::now();
        $Condolencia-> created_at = Carbon::now();

        $Condolencia->save();
        return redirect()->route('invitado.confirmacion-condolencia');
    }

}
