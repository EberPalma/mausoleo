<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TitularesController extends Controller
{
    public function index()
    {
        $titulares = \DB::table('titulares')
                        ->get();
        
        if($titulares != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se pudo obtener la informacion';
            $error = '1';
        }
                
        return json_encode(array('message' => $mensaje,'errors' => $error, 'data' => $titulares));
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
            'idNicho' => 'required|integer',
            'nombre' => 'required|string',
            'email' => 'required|string',
            'telefono' => 'required|integer',
            'familia' => 'required|string'
        ]);

        try{
            $titulares = \DB::table('titulares')
                            ->insert([
                                'idNicho' => $request->idNicho,
                                'nombre' => $request->nombre,
                                'email' => $request->email,
                                'telefono' => $request->telefono,
                                'familia' => $request->familia
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
        $titulares = \DB::table('titulares')->where('id', $id);
        
        if($titulares != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $titulares));
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
            'idNicho' => 'required|integer',
            'nombre' => 'required|string',
            'email' => 'required|string',
            'telefono' => 'required|integer',
            'familia' => 'required|string'
        ]);

        if(\DB::table('titulares')->where('id', $id) != null){
            $error = '0';

           \DB::table('titulares')->where('id', $id)
                            ->update([
                                'idNicho' => $request->idNicho,
                                'nombre' => $request->nombre,
                                'email' => $request->email,
                                'telefono' => $request->telefono,
                                'familia' => $request->familia
                            ]);

            $mensaje = "Informacion actualizada correctamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $titulares));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $titulares = \DB::table('titulares')->where('id', $id)->get();
        if($titulares != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }
        $activo = $titulares[0]->activo;
        $titulares = \DB::table('titulares')->where('id', $id)->update(['activo' => $activo == 1 ? 0 : 1]);
        $titulares = \DB::table('titulares')->where('id', $id)->get();
        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $titulares));
    }
}
