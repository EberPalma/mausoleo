<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cat_rol;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Cat_rol::all();
        if($rol != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $rol));
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
            'nombre' => 'required|string',
            'nivel' => 'required|integer',
            'activo' => 'required|integer',
            'redirect' => 'required|string'
        ]);

        try{
            $rol = Cat_rol::create([
                'nombre' => $request->nombre,
                'nivel' => $request->nivel,
                'redirect' => $request->redirect,
                'creado' => date('Y/m/d H:i:s'),
                'modificado' => date('Y/m/d H:i:s'),
                'activo' => $request->activo,
            ]);
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        
        return json_encode(array('message' => $mensaje, 'errors' => $rol));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Cat_rol::find($id);
        
        if($rol != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $rol));
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
            'nombre' => 'required|string',
            'nivel' => 'required|integer',
            'activo' => 'required|integer',
            'redirect' => 'required|string'
        ]);

        $rol = Cat_rol::find($id);

        if($rol != null){
            $error = '0';

            $rol->nombre = $request->nombre;
            $rol->nivel = $request->nivel;
            $rol->redirect = $request->redirect; 
            $rol->modificado = date('Y/m/d H:i:s');
            $rol->activo = $request->activo;

            $rol->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $rol));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Cat_rol::find($id);

        if($rol != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('cat_rol')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('cat_rol')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $rol = Cat_rol::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $rol));
        }
        if($activo[0]->bactivo == true){
            \DB::table('cat_rol')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $rol = Cat_rol::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $rol));
        }
    }
}
