<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{

    public function index($tipo)
    {
        $contacto = "";
        switch ($tipo){
            case "sinatender":
                $contacto = \DB::table('contacto')->where('atendido', 0)->where('activo', 1)->get();
                break;
            case "atendidas":
                $contacto = \DB::table('contacto')->where('atendido', 1)->where('activo', 1)->get();
                break;
            case "todas":
                $contacto = \DB::table('contacto')->where('activo', 1)->get();
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
}
}
