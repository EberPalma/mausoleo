<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cat_clientes;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cat_clientes::all();
        if($clientes != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $clientes));
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
            'rfc' => 'nullable|string',
            'calle' => 'nullable|string',
            'no_exterior' => 'nullable|integer',
            'no_interior' => 'nullable|integer',
            'colonia' => 'nullable|string',
            'delegacion' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'estado' => 'nullable|string',
            'codigo_postal' => 'nullable|integer|min:5',
            'email' => 'nullable|string|email',
            'email_alternativo' => 'nullable|string|email',
            'telefono' => 'nullable|min:10|numeric',
            'tel_trabajo' => 'nullable|min:10|numeric',
            'tel_adicional' => 'nullable|min:10|numeric',
            'celular' => 'nullable|min:10|numeric',
            'cel_adicional' => 'nullable|min:10|numeric'
        ]);

        try{
            $cliente = Cat_clientes::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cat_clientes::find($id);
        
        if($cliente != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $cliente));
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
            'rfc' => 'nullable|string',
            'calle' => 'nullable|string',
            'no_exterior' => 'nullable|integer',
            'no_interior' => 'nullable|integer',
            'colonia' => 'nullable|string',
            'delegacion' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'estado' => 'nullable|string',
            'codigo_postal' => 'nullable|integer|min:5',
            'email' => 'nullable|string|email',
            'email_alternativo' => 'nullable|string|email',
            'telefono' => 'nullable|min:10|numeric',
            'tel_trabajo' => 'nullable|min:10|numeric',
            'tel_adicional' => 'nullable|min:10|numeric',
            'celular' => 'nullable|min:10|numeric',
            'cel_adicional' => 'nullable|min:10|numeric'
        ]);

        $cliente = Cat_clientes::find($id);
        if($cliente != null){
            $error = '0';
            $cliente->nombre = $request->nombre;
            $cliente->rfc = $request->rfc;
            $cliente->calle = $request->calle;
            $cliente->no_exterior = $request->no_exterior;
            $cliente->no_interior = $request->no_interior;
            $cliente->colonia = $request->colonia;
            $cliente->delegacion = $request->delegacion;
            $cliente->ciudad = $request->ciudad;
            $cliente->estado = $request->estado;
            $cliente->codigo_postal = $request->codigo_postal;
            $cliente->email = $request->email;
            $cliente->email_alternativo = $request->email_alternativo;
            $cliente->telefono = $request->telefono;
            $cliente->tel_trabajo = $request->tel_trabajo;
            $cliente->tel_adicional = $request->tel_adicional;
            $cliente->celular = $request->celular;
            $cliente->cel_adicional = $request->cel_adicional;

            $cliente->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $cliente));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cat_clientes::find($id);

        if($cliente != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('cat_clientes')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('cat_clientes')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $nicho = Cat_clientes::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nicho));
        }
        if($activo[0]->bactivo == true){
            \DB::table('cat_clientes')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $nicho = Cat_clientes::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nicho));
        }
    }
}
