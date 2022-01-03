<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\huespedes;

class HuespedesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $huesped = Huespedes::all();
        if($huesped != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $huesped));
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
            'id_nicho' => 'nullable|integer',
            'bcenizas' => 'nullable|integer',
            'nombre' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'fecha_defuncion' => 'required|date',
            'fecha_ingreso' => 'nullable|date',
            'fecha_na_aux' => 'nullable|date',
            'fecha_aux2' => 'nullable|date',
            'fecha_aux3' => 'nullable|date'
        ]);

        try{
            $huesped = Huespedes::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        
        return json_encode(array('message' => $mensaje, 'errors' => $huesped));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $huesped = Huespedes::find($id);
        
        if($huesped != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $huesped));
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
            'id_nicho' => 'nullable|integer',
            'bcenizas' => 'nullable|integer',
            'nombre' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'fecha_defuncion' => 'required|date',
            'fecha_ingreso' => 'nullable|date',
            'fecha_na_aux' => 'nullable|date',
            'fecha_aux2' => 'nullable|date',
            'fecha_aux3' => 'nullable|date'
        ]);

        $huesped = Huespedes::find($id);

        if($huesped != null){
            $error = '0';

            $huesped->nombre = $request->nombre;
            $huesped->fecha_nacimiento = $request->fecha_nacimiento;
            $huesped->fecha_defuncion = $request->fecha_defuncion;
            $huesped->fehca_ingreso = $request->fecha_ingreso;
            if($request->id_contrato != null){
                $huesped->id_contrato = $request->id_contrato;
            }if($request->id_nicho != null){
                $huesped->id_nicho = $request->id_nicho;
            }if($request->bcenizas != null){
                $huesped->bcenizas = $request->bcenizas;
            }
            if($request->fecha_na_aux != null){
                $huesped->fecha_na_aux = $request->fecha_na_aux;
            }
            if($request->fecha_aux2 != null){
                $huesped->fecha_aux2 = $request->fecha_aux2;
            }
            if($request->fechaaux3 != null){
                $huesped->fechaaux3 = $request->fechaaux3;
            }

            $huesped->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $huesped));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $huesped = Huespedes::find($id);

        if($huesped != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('huespedes')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('huespedes')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $huesped = Huespedes::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $huesped));
        }
        if($activo[0]->bactivo == true){
            \DB::table('huespedes')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $huesped = Huespedes::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $huesped));
        }
    }
}
