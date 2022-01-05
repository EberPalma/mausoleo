<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recibos;

class RecibosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recibo = Recibos::all();
        if($recibo != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $recibo));
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
            'id_usuario' => 'required|integer',
            'id_cliente' => 'required|integer',
            'id_nicho' => 'required|integer',
            'id_medoto_pago' => 'required|integer',
            'total_sin_descuento' => 'nullable|numeric',
            'descuento' => 'nullable|numeric',
            'subtotal' => 'required|numeric',
            'iva' => 'nullable|numeric',
            'total' => 'required|numeric',
            'fecha_aux' => 'nullable|date'
        ]);

        try{
            $recibo = Recibos::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        
        return json_encode(array('message' => $mensaje, 'errors' => $recibo));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recibo = Recibos::find($id);
        
        if($recibo != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $recibo));
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
            'id_usuario' => 'required|integer',
            'id_cliente' => 'required|integer',
            'id_nicho' => 'required|integer',
            'id_medoto_pago' => 'required|integer',
            'total_sin_descuento' => 'nullable|numeric',
            'descuento' => 'nullable|numeric',
            'subtotal' => 'required|numeric',
            'iva' => 'nullable|numeric',
            'total' => 'required|numeric',
            'fecha_aux' => 'nullable|date'
        ]);

        $recibo = Recibos::find($id);

        if($recibo != null){
            $error = '0';

            $recibo->id_usuario = $request->id_usuario;
            $recibo->id_cliente = $request->id_cliente;
            $recibo->id_nicho = $request->id_nicho;
            $recibo->id_medoto_pago = $request->id_medoto_pago;
            $recibo->total_sin_descuento = $request->total_sin_descuento;
            $recibo->descuento = $request->descuento;
            $recibo->subtotal = $request->subtotal;
            $recibo->iva = $request->iva;
            $recibo->total = $request->total;
            $recibo->fecha_aux = $request->fecha_aux;

            $recibo->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $recibo));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recibo = Recibos::find($id);

        if($recibo != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('recibos')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('recibos')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $recibo = Recibos::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $recibo));
        }
        if($activo[0]->bactivo == true){
            \DB::table('recibos')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $recibo = Recibos::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $recibo));
        }
    }
}
