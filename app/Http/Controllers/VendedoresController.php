<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cat_vendedores;

class VendedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedor = Cat_vendedores::all();
        if($vendedor != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $vendedor));
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
            'aux' => 'nullable|string',
            'nombre' => 'required|string',
            'fecha_ingreso' => 'nullable|date',
        ]);

        try{
            $vendedor = Cat_vendedores::create([
                'aux' => $request->aux,
                'nombre' => $request->nombre,
                'fecha_ingreso' => $request->fecha_ingreso,
                'bactivo' => 1
            ]);
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        
        return json_encode(array('message' => $mensaje, 'errors' => $vendedor));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendedor = Cat_vendedores::find($id);
        
        if($vendedor != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $vendedor));
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
            'aux' => 'nullable|string',
            'nombre' => 'required|string',
            'fecha_ingreso' => 'nullable|date',
        ]);

        $vendedor = Cat_vendedores::find($id);

        if($vendedor != null){
            $error = '0';

            $vendedor->aux = $request->aux;
            $vendedor->nombre = $request->nombre;
            $vendedor->fecha_ingreso = $request->fecha_ingreso;

            $vendedor->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $vendedor));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedor = Cat_vendedores::find($id);

        if($vendedor != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('cat_vendedores')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('cat_vendedores')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $vendedor = Cat_vendedores::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $vendedor));
        }
        if($activo[0]->bactivo == true){
            \DB::table('cat_vendedores')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $vendedor = Cat_vendedores::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $vendedor));
        }
    }
}
