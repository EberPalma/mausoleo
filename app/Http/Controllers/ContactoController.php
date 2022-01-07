<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacto;

class ContactoController extends Controller
{
    public function index($tipo)
    {
        $contacto = "";
        switch ($tipo){
            case "sinatender":
                $contacto = \DB::table('contacto')->where('atendido', 0)->get();
                break;
            case "atendidas":
                $contacto = \DB::table('contacto')->where('atendido', 1)->get();
                break;
            case "todas":
                $contacto = Contacto::all();
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

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'telefono' => 'required|integer|min:10',
            'email' => 'nullable|string',
            'asunto' => 'required|string',
            'mensaje' => 'required|string'
        ]);

        try{
            $contacto = Contacto::create([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'asunto' => $request->asunto,
                'mensaje' => $request->mensaje,
                'atendido' => 0
            ]);
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        
        return json_encode(array('message' => $mensaje, 'errors' => $contacto));
    }
}
