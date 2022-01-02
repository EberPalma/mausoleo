<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrato = Contrato::all();
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
            'id_unidad' => 'nullable|integer',
            'id_nicho' => 'required|integer',
            'id_cliente' => 'required|integer',
            'id_tipo_contrato' => 'required|integer',
            'id_estado_contrato' => 'nullable|integer',
            'id_vendedor' => 'required|integer',
            'id_modalidad' => 'nullable|integer',
            'id_metodo' => 'nullable|integer',
            'id_contrato_org' => 'nullable|integer',
            'contrato' => 'nullable|string',
            'descuento' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'costo_original' => 'nullable|numeric',
            'mensualidad' => 'nullable|numeric',
            'penalizacion' => 'nullable|numeric',
            'observaciones' => 'nullable|string',
            'unidad_cobro' => 'nullable|integer',
            'vendedor' => 'nullable|string',
            'placa_fam' => 'nullable|string',
            'religion' => 'nullable|string',
            'facturado' => 'nullable|string',
            'factura' => 'nullable|string',
            'fecha_aux' => 'nullable|string',
            'p_inden_oficial' => 'nullable|string',
            'p_iden_laboral' => 'nullable|string',
            'p_comprobante' => 'nullable|string',
            'mottivo_cancelacion' => 'nullable|string',
            'meses' => 'nullable|integer',
            'enganche' => 'nullable|numeric',
            'apartado' => 'nullable|numeric'
        ]);

        try{
            $contrato = Contrato::create($request->all());
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
        $contrato = Contrato::find($id);
        
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
            'id_unidad' => 'nullable|integer',
            'id_nicho' => 'required|integer',
            'id_cliente' => 'required|integer',
            'id_tipo_contrato' => 'required|integer',
            'id_estado_contrato' => 'nullable|integer',
            'id_vendedor' => 'required|integer',
            'id_modalidad' => 'nullable|integer',
            'id_metodo' => 'nullable|integer',
            'id_contrato_org' => 'nullable|integer',
            'contrato' => 'nullable|string',
            'descuento' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'costo_original' => 'nullable|numeric',
            'mensualidad' => 'nullable|numeric',
            'penalizacion' => 'nullable|numeric',
            'observaciones' => 'nullable|string',
            'unidad_cobro' => 'nullable|integer',
            'vendedor' => 'nullable|string',
            'placa_fam' => 'nullable|string',
            'religion' => 'nullable|string',
            'facturado' => 'nullable|string',
            'factura' => 'nullable|string',
            'fecha_aux' => 'nullable|string',
            'p_inden_oficial' => 'nullable|string',
            'p_iden_laboral' => 'nullable|string',
            'p_comprobante' => 'nullable|string',
            'mottivo_cancelacion' => 'nullable|string',
            'meses' => 'nullable|integer',
            'enganche' => 'nullable|numeric',
            'apartado' => 'nullable|numeric'
        ]);

        $contrato = Contrato::find($id);
        if($contrato != null){
            $error = '0';
            $contrato->id_unidad = $request->id_unidad;
            $contrato->id_nicho = $request->id_nicho;
            $contrato->id_cliente = $request->id_cliente;
            $contrato->id_tipo_contrato = $request->id_tipo_contrato;
            $contrato->id_estado_contrato = $request->id_estado_contrato;
            $contrato->id_vendedor = $request->id_vendedor;
            $contrato->id_modalidad = $request->id_modalidad;
            $contrato->id_metodo = $request->id_metodo;
            $contrato->id_contrato_org = $request->id_contrato_org;
            $contrato->contrato = $request->contrato;
            $contrato->fecha_compra = $request->fecha_compra;
            $contrato->descuento = $request->descuento;
            $contrato->total = $request->total;
            $contrato->costo_original = $request->costo_original;
            $contrato->mensualidad = $request->mensualidad;
            $contrato->penalizacion = $request->penalizacion;
            $contrato->observaciones = $request->observaciones;
            $contrato->unidad_cobro = $request->unidad_cobro;
            $contrato->vendedor = $request->vendedor;
            $contrato->placa_fam = $request->placa_fam;
            $contrato->religion = $request->religion;
            $contrato->facturado = $request->facturado;
            $contrato->factura = $request->factura;
            $contrato->fecha_aux = $request->fecha_aux;
            $contrato->p_inden_oficial = $request->p_inden_oficial;
            $contrato->p_iden_laboral = $request->p_iden_laboral;
            $contrato->p_comprobante = $request->p_comprobante;
            $contrato->mottivo_cancelacion = $request->mottivo_cancelacion;
            $contrato->meses = $request->meses;
            $contrato->enganche = $request->enganche;
            $contrato->apartado = $request->apartado;

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
        $contrato = Contrato::find($id);

        if($contrato != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('contrato')->where('id', $id)->get();

        if($activo[0]->activo == false){
            \DB::table('contrato')->where('id', $id)->update(array('activo' => true));
            $mensaje = 'El registro ha sido activado';
            $contrato = Contrato::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contrato));
        }
        if($activo[0]->activo == true){
            \DB::table('contrato')->where('id', $id)->update(array('activo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $contrato = Contrato::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $contrato));
        }
    }
}
