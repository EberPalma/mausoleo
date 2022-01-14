<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DireccionesController extends Controller
{
    public function index()
    {
        $direcciones = \DB::table('direcciones')
                        ->get();
        
        if($direcciones != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se pudo obtener la informacion';
            $error = '1';
        }
                
        return json_encode(array('message' => $mensaje,'errors' => $error, 'data' => $direcciones));
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
            'idCliente' => 'nullable|integer',
            'idTitular' => 'nullable|integer',
            'calle' => 'required|string',
            'numExterno' => 'nullable|string',
            'numInterno' => 'nullable|string',
            'colonia' => 'required|string',
            'municipio' => 'required|string',
            'codigoPostal' => 'required|integer',
            'estado' => 'required|string',
            'pais' => 'required|string'
        ]);

        try{
            $direcciones = \DB::table('direcciones')
                            ->insert([
                                'idCliente' => $request->idCliente
                                'idTitular' => $request->idTitular
                                'calle' => $request->calle
                                'numExterno' => $request->numExterno
                                'numInterno' => $request->numInterno
                                'colonia' => $request->colonia
                                'municipio' => $request->municipio
                                'codigoPostal' => $request->codigoPostal
                                'estado' => $request->estado
                                'pais' => $request->pais
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
        $direcciones = \DB::table('direcciones')->where('id', $id);
        
        if($direcciones != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $direcciones));
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
            'idCliente' => 'nullable|integer',
            'idTitular' => 'nullable|integer',
            'calle' => 'required|string',
            'numExterno' => 'nullable|string',
            'numInterno' => 'nullable|string',
            'colonia' => 'required|string',
            'municipio' => 'required|string',
            'codigoPostal' => 'required|integer',
            'estado' => 'required|string',
            'pais' => 'required|string'
        ]);

        if(\DB::table('direcciones')->where('id', $id) != null){
            $error = '0';

           \DB::table('direcciones')->where('id', $id)
                            ->update([
                                'idCliente' => $request->idCliente
                                'idTitular' => $request->idTitular
                                'calle' => $request->calle
                                'numExterno' => $request->numExterno
                                'numInterno' => $request->numInterno
                                'colonia' => $request->colonia
                                'municipio' => $request->municipio
                                'codigoPostal' => $request->codigoPostal
                                'estado' => $request->estado
                                'pais' => $request->pais
                            ]);

            $mensaje = "Informacion actualizada correctamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $direcciones));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direcciones = \DB::table('direcciones')->where('id', $id)->get();
        if($direcciones != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }
        $activo = $direcciones[0]->activo;
        $direcciones = \DB::table('direcciones')->where('id', $id)->update(['activo' => $activo == 1 ? 0 : 1]);
        $direcciones = \DB::table('direcciones')->where('id', $id)->get();
        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $direcciones));
    }
}
