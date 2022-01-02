<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::all();
        if($config != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $config));
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
            'anio' => 'nullable|integer',
            'var' => 'required|string',
            'value' => 'required|string'
        ]);

        try{
            $config = Config::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }

        return json_encode(array('message' => $mensaje, 'errors' => $config));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = Config::find($id);
        
        if($config != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $config));
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
            'anio' => 'nullable|integer',
            'var' => 'required|string',
            'value' => 'required|string'
        ]);

        $config = Config::find($id);
        if($config != null){
            $error = '0';
            $config->anio = $request->anio;
            $config->var = $request->var;
            $config->value = $request->value;

            $config->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $config));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $config = Config::find($id);

        if($config != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('config')->where('id', $id)->get();

        if($activo[0]->activo == false){
            \DB::table('config')->where('id', $id)->update(array('activo' => true));
            $mensaje = 'El registro ha sido activado';
            $config = Config::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $config));
        }
        if($activo[0]->activo == true){
            \DB::table('config')->where('id', $id)->update(array('activo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $config = Config::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $config));
        }
    }
}
