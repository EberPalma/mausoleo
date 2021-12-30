<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cat_mod;

class Cat_modController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mod = Cat_mod::all();
        if($mod != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $mod));
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
            'posicion' => 'required|string',
            'nombre' => 'required|string',
            'tipo' => 'required|string',
            'url' => 'required|string',
            'url_alias' => 'nullable|string',
            'creado' => 'required|date',
            'modificado' => 'required|date',
            'modulo' => 'required|string',
            'icono' => 'required|string',
            'activo' => 'required|integer',
            'id_superior' => 'required|integer'
        ]);

        try{
            $mod = Cat_mod::create([
                'posicion' =>$request->posicion,
                'nombre' => $request->nombre,
                'tipo' => $request->tipo,
                'url' => $request->url,
                'url_alias' => $request->url_alias,
                'creado' => date('Y/m/d H:i:s'),
                'modificado' => date('Y/m/d H:i:s'),
                'modulo' => $request->modulo,
                'icono' => $request->icono,
                'activo' => $request->activo,
                'id_superior' => $request->id_superior != null ? $request->id_superior : 0
            ]);
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        
        return json_encode(array('message' => $mensaje, 'errors' => $mod));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mod = Cat_mod::find($id);
        
        if($mod != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $mod));
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
            'posicion' => 'required|string',
            'nombre' => 'required|string',
            'tipo' => 'required|string',
            'url' => 'required|string',
            'url_alias' => 'nullable|string',
            'creado' => 'required|date',
            'modificado' => 'required|date',
            'modulo' => 'required|string',
            'icono' => 'required|string',
            'activo' => 'required|integer',
            'id_superior' => 'required|integer'
        ]);

        $mod = Cat_mod::find($id);

        if($mod != null){
            $error = '0';

            $mod->posicion = $request->posicion;
            $mod->nombre = $request->nombre;
            $mod->tipo = $request->tipo;
            $mod->url = $request->url; 
            $mod->url_alias = $request->mod;
            $mod->creado = $request->creado;
            $mod->modificado = $request->modificado;
            $mod->modulo = $request->modulo;
            $mod->icono = $request->icono;
            $mod->activo = $request->activo;
            $mod->id_superior = $request->id_superior;

            $mod->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $mod));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mod = Cat_mod::find($id);

        if($mod != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('cat_mod')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('cat_mod')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $mod = Cat_mod::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $mod));
        }
        if($activo[0]->bactivo == true){
            \DB::table('cat_mod')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $mod = Cat_mod::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $mod));
        }
    }
}
