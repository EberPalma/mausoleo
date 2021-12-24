<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\nichos;
use Illuminate\Support\Facades\Log;


class NichosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nichos = Nichos::all();

        if($nichos != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se pudo obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje,'errors' => $error, 'data' => $nichos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente'=>'required|integer',
            'id_tipo_nicho'=>'nullable|integer',
            'id_nivel'=>'nullable|integer',
            'numero'=>'nullable|string',
            'capacidad'=>'required|integer',
            'id_ubicacion'=>'nullable|integer',
            'bpreregistro'=>'nullable|integer'
        ]);

        try{
            $nicho = Nichos::create($request->all());
            $mensaje = "Registro realizado correctamente";
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage(); 
        }
        return json_encode(array('message' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nicho = Nichos::find($id);
        
        if($nicho != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nicho));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_cliente'=>'nullable|integer',
            'id_tipo_nicho'=>'nullable|integer',
            'id_nivel'=>'nullable|integer',
            'numero'=>'nullable|string',
            'capacidad'=>'nullable|integer',
            'id_ubicacion'=>'nullable|integer',
            'bpreregistro'=>'nullable|integer'
        ]);

        $nicho = Nichos::find($id);
        if($nicho != null){
            $error = '0';

            $nicho->id_cliente = $request->id_cliente;
            $nicho->id_tipo_nicho = $request->id_tipo_nicho;
            $nicho->id_nivel = $request->id_nivel;
            $nicho->numero = $request->numero;
            $nicho->capacidad = $request->capacidad;
            $nicho->id_ubicacion = $request->id_ubicacion;
            $nicho->bpreregistro = $request->bpreregistro;
            if($nicho->activo == null){
                $nicho->activo = true;
            }
            $nicho->save();

            $mensaje = "Informacion actualizada correctamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nicho));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nicho = Nichos::find($id);

        if($nicho != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        if($nicho->activo == null){
            $nicho->activo = true;
            $mensaje = 'El registro ha sido activado';
        }
        if($nicho->activo == true){
            $nicho->activo = false;
            $mensaje = 'El registro ha sido desactivado';
        }
        if($nicho->activo == false){
            $nicho->activo = true;
            $mensaje = 'El registro ha sido activado';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nicho));

    }
}
