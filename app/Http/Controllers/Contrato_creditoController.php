<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contrato_credito;

class Contrato_creditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrato = Contrato_credito::all();
        if($contrato != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contrato));
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
            'id_contrato' => 'nullable|integer',
            'costo_mensual' => 'nullable|numeric',
            'fecha_pago' => 'required|date'
        ]);

        try{
            $contrato = Contrato_credito::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }

        return json_encode(array('message' => $mensaje, 'errors' => $contrato));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato_credito::find($id);
        
        if($contrato != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contrato));
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
            'id_contrato' => 'nullable|integer',
            'costo_mensual' => 'nullable|numeric',
            'fecha_pago' => 'required|date'
        ]);

        $contrato = Contrato_credito::find($id);
        if($contrato != null){
            $error = '0';
            $contrato->id_contrato = $request->id_contrato;
            $contrato->costo_mensual = $request->costo_mensual;
            $contrato->fecha_pago = $request->fecha_pago;

            $contrato->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contrato));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato_credito::find($id);

        if($contrato != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('contrato_credito')->where('id', $id)->get();

        if($activo[0]->activo == false){
            \DB::table('contrato_credito')->where('id', $id)->update(array('activo' => true));
            $mensaje = 'El registro ha sido activado';
            $contrato = Contrato_credito::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contrato));
        }
        if($activo[0]->activo == true){
            \DB::table('contrato_credito')->where('id', $id)->update(array('activo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $contrato = Contrato_credito::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contrato));
        }
    }
}
