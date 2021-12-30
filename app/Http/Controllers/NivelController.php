<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivel = Cat_nivel::all();
        if($nivel != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nivel));
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
            'id_capacidad' => 'nullable|integer',
            'nombre' => 'required|string',
            'precio' => 'nullable|numeric',
            'enganche' => 'nullable|numeric',
            'mensualidad' => 'nullable|numeric'
        ]);

        try{
            $nivel = Cat_nivel::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }

        return json_encode(array('message' => $mensaje, 'errors' => $nivel));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivel = Cat_nivel::find($id);
        
        if($nivel != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nivel));
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
            'id_capacidad' => 'nullable|integer',
            'nombre' => 'required|string',
            'precio' => 'nullable|numeric',
            'enganche' => 'nullable|numeric',
            'mensualidad' => 'nullable|numeric'
        ]);

        $nivel = Avales::find($id);
        if($cliente != null){
            $error = '0';

            $nivel->id_capacidad = $request->id_capacidad;
            $nivel->nombre = $request->nombre;
            $nivel->precio = $request->precio;
            $nivel->enganche = $request->enganche;
            $nivel->mensualidad = $request->mensualidad;

            $nivel->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nivel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel = Cat_nivel::find($id);

        if($nivel != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('cat_nivel')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('cat_nivel')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $nivel = Cat_nivel::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nivel));
        }
        if($activo[0]->bactivo == true){
            \DB::table('cat_nivel')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $nivel = Cat_nivel::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nivel));
        }
    }
}
