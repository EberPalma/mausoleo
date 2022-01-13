<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NichosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nicho = \DB::table('nichos')
                        ->select('id', 'coordenada', 'capacidad', 'nombre', 'familia')
                        ->get();
        
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
            'coordenada'=>'required|string',
            'capacidad'=>'required|string',
            'nombre'=>'required|string',
            'familia'=>'required|string',
        ]);

        try{
            $nicho = \DB::table('nichos')
                            ->insert([
                                'coordenada' => $request->coordenada,
                                'capacidad' => $request->capacidad,
                                'nombre' => $request->nombre,
                                'familia' => $request->familia,
                                'activo' => 1
                            ]);
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
        $nicho = \DB::table('nichos')->where('id', $id);
        
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

        if(\DB::table('nichos')->where('id', $id) != null){
            $error = '0';

           \DB::table('nichos')->where('id', $id)
                            ->update([
                                'coordenada' => $request->coordenada,
                                'capacidad' => $request->capacidad,
                                'nombre' => $request->nombre,
                                'familia' => $request->familia
                            ]);

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
        $nicho = \DB::table('nichos')->where('id', $id)->get();
        if($nicho != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }
        $activo = $nicho[0]->activo;
        $nicho = \DB::table('nichos')->where('id', $id)->update(['activo' => $activo == 1 ? 0 : 1]);
        $nicho = \DB::table('nichos')->where('id', $id)->get();
        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nicho));
    }
}
