<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pagos;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pago = Pagos::all();
        if($pago != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $pago));
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
            'id_recibo' => 'nullable|integer',
            'id_nicho' => 'required|integer',
            'id_cliente' => 'required|integer',
            'id_estado_pago' => 'required|integer',
            'id_contrato' => 'required|integer',
            'id_tipo_pago' => 'required|integer',
            'anio' => 'required|date',
            'descuento' => 'nullable|numeric',
            'costo' => 'nullable|numeric',
            'concepto' => 'required|string',
            'fecha_pago' => 'nullable|date',
            'fecha_vencimiento' => 'nullable|date',
            'fecha_aux' => 'nullable|date'
        ]);

        try{
            $pago = Pagos::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        
        return json_encode(array('message' => $mensaje, 'errors' => $pago));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago = Pagos::find($id);
        
        if($pago != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $pago));
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
            'id_recibo' => 'nullable|integer',
            'id_nicho' => 'required|integer',
            'id_cliente' => 'required|integer',
            'id_estado_pago' => 'required|integer',
            'id_contrato' => 'required|integer',
            'id_tipo_pago' => 'required|integer',
            'anio' => 'required|date',
            'descuento' => 'nullable|numeric',
            'costo' => 'nullable|numeric',
            'concepto' => 'required|string',
            'fecha_pago' => 'nullable|date',
            'fecha_vencimiento' => 'nullable|date',
            'fecha_aux' => 'nullable|date'
        ]);

        $pago = Pagos::find($id);

        if($pago != null){
            $error = '0';

            $pago->id_usuario = $request->id_usuario;
            $pago->id_recibo = $request->id_recibo;
            $pago->id_nicho = $request->id_nicho;
            $pago->id_cliente = $request->id_cliente;
            $pago->id_estado_pago = $request->id_estado_pago;
            $pago->id_contrato = $request->id_contrato;
            $pago->id_tipo_pago = $request->id_tipo_pago;
            $pago->anio = $request->anio;
            $pago->descuento = $request->descuento;
            $pago->costo = $request->costo;
            $pago->concepto = $request->concepto;
            $pago->fecha_pago = $request->fecha_pago;
            $pago->fecha_vencimiento = $request->fecha_vencimiento;
            $pago->fecha_aux = $request->fecha_aux;

            $pago->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $pago));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pago = Pagos::find($id);

        if($pago != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('pagos')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('pagos')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $pago = Pagos::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $pago));
        }
        if($activo[0]->bactivo == true){
            \DB::table('pagos')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $pago = Pagos::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $pago));
        }
    }
}
