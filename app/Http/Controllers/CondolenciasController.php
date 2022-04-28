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

    public function index($tipo, $activo)
    {
        $condolencia = "";
        switch ($tipo){
            case "sinverificar":
                $condolencia = \DB::table('condolencias')->where('verificado', 0)->where('activo', $activo)->get();
                break;
            case "verificadas":
                $condolencia = \DB::table('condolencias')->where('verificado', 1)->where('activo', $activo)->get();
                break;
            case "todas":
                $condolencia = \DB::table('condolencias')->where('activo', $activo)->get();
                break;
        }
        if($condolencia != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }
        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $condolencia));
    }

    public function setChecked($id){
        $condolencia = Condolencia::find($id);
        if($condolencia->verificado == 1){
            $condolencia->verificado = 0;
            $condolencia->save();
        }else{
            $condolencia->verificado = 1;
            $condolencia->save();
        }
    }

    public function setActivo($id){
        $condolencia = Condolencia::find($id);
        if($condolencia->activo == 1){
            $condolencia->activo = 0;
            $condolencia->save();
            return $condolencia;
        }else{
            $condolencia->activo = 1;
            $condolencia->save();
            return $condolencia;
        }
    }

    public function showDeleted(){
        $condolencia = \DB::table('contacto')->where('activo', 0)->get();
        return $condolencia;
    }

}
