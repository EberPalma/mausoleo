<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\avales;

class AvalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avales = Avales::all();
        if($avales != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $avales));
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
            'id_contrato' => 'required|integer',
            'nombre' => 'required|string',
            'calle' => 'nullable|string',
            'no_exterior' => 'nullable|integer',
            'no_interior' => 'nullable|integer',
            'colonia' => 'nullable|string',
            'municipio' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'estado' => 'nullable|string',
            'codigo_postal' => 'nullable|integer|min:5',
            'parentesco' => 'nullable|string',
            'email' => 'nullable|string|email',
            'telefono' => 'nullable|min:10|numeric',
            'orden' => 'nullable|integer',
            'id_cliente' => 'required|integer'
        ]);

        try{
            $aval = Avales::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }

        return json_encode(array('message' => $mensaje, 'errors' => $aval));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aval = Avales::find($id);
        
        if($aval != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $aval));
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
            'id_contrato' => 'required|integer',
            'nombre' => 'required|string',
            'calle' => 'nullable|string',
            'no_exterior' => 'nullable|integer',
            'no_interior' => 'nullable|integer',
            'colonia' => 'nullable|string',
            'municipio' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'estado' => 'nullable|string',
            'codigo_postal' => 'nullable|integer|min:5',
            'parentesco' => 'nullable|string',
            'email' => 'nullable|string|email',
            'telefono' => 'nullable|min:10|numeric',
            'orden' => 'nullable|integer',
            'id_cliente' => 'required|integer'
        ]);

        $aval = Avales::find($id);
        if($aval != null){
            $error = '0';
            $aval->id_contrato = $request->id_contrato;
            $aval->nombre = $request->nombre;
            $aval->calle = $request->calle;
            $aval->no_exterior = $request->no_exterior;
            $aval->no_interior = $request->no_interior;
            $aval->colonia = $request->colonia;
            $aval->municipio = $request->municipio;
            $aval->ciudad = $request->ciudad;
            $aval->estado = $request->estado;
            $aval->codigo_postal = $request->codigo_postal;
            $aval->parentesco = $request->parentesco;
            $aval->email = $request->email;
            $aval->telefono = $request->telefono;
            $aval->orden = $request->orden;
            $aval->id_cliente = $request->id_cliente;

            $aval->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $aval));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aval = Avales::find($id);

        if($aval != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('avales')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('avales')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $aval = Avales::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $aval));
        }
        if($activo[0]->bactivo == true){
            \DB::table('avales')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $aval = Avales::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $aval));
        }
    }
}
