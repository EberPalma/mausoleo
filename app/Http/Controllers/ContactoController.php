<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacto;

class ContactoController extends Controller
{
    public function store1(Request $request){

        $request->validate([
            'nombre' => 'required',
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);

        $contacto = new contacto();
        $contacto-> nombre = $request->nombre;
        $contacto-> telefono = $request->telefono;
        $contacto-> email = $request->email;
        $contacto-> asunto = $request->asunto;
        $contacto-> mensaje = $request->mensaje;
        $contacto-> atendido = $request->atendido;
        $contacto-> activo = $request->activo;

        $contacto->save();
        return redirect()->route('invitado.confirmacion-contacto');
    }

    public function index($tipo, $activo)
    {
        $contacto = "";
        switch ($tipo){
            case "sinatender":
                $contacto = \DB::table('contacto')->where('atendido', 0)->where('activo', $activo)->get();
                break;
            case "atendidas":
                $contacto = \DB::table('contacto')->where('atendido', 1)->where('activo', $activo)->get();
                break;
            case "todas":
                $contacto = \DB::table('contacto')->where('activo', $activo)->get();
                break;
        }

        if($contacto != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }
        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contacto));
    }

    public function indexDashboard(){
        $contacto = \DB::table('contacto')
                            ->select('id', 'mensaje', 'atendido', 'asunto')
                            ->where('atendido', 0)
                            ->take(5)
                            ->orderBy('id', 'DESC')
                            ->get();
        if($contacto != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contacto));
    }
    public function store(Request $request){
        $request->validate([
            "nombre" => 'required|string',
            "telefono" => 'required|integer|min:10',
            "email" => 'nullable|string',
            "asunto" => 'required|string',
            "mensaje" => 'required|string'
        ]);
        try{
            $contacto = Contacto::create([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'asunto' => $request->asunto,
                'mensaje' => $request->mensaje,
                'atendido' => 0,
                'activo' => 1
            ]);
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }

        return json_encode(array('message' => $mensaje, 'errors' => $contacto));
    }
    public function setChecked($id){
        $contacto = Contacto::find($id);
        if($contacto->atendido == 1){
            $contacto->atendido = 0;
            $contacto->save();
        }else{
            $contacto->atendido = 1;
            $contacto->save();
        }
    }
    public function setActivo($id){
        $contacto = Contacto::find($id);
        if($contacto->activo == 1){
            $contacto->activo = 0;
            $contacto->save();
            return $contacto;
        }else{
            $contacto->activo = 1;
            $contacto->save();
            return $contacto;
        }
    }

    public function showDeleted(){
        $contacto = \DB::table('contacto')->where('activo', 0)->get();
        return $contacto;
    }
}

