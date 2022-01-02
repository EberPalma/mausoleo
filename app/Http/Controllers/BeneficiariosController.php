<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beneficiarios;

class BeneficiariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiarios = Beneficiarios::all();
        if($beneficiarios != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $beneficiarios));
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
        ]);

        try{
            $beneficiario = Beneficiarios::create($request->all());
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }

        return json_encode(array('message' => $mensaje, 'errors' => $beneficiario));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beneficiario = Beneficiarios::find($id);
        
        if($beneficiario != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $beneficiario));
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
        ]);

        $beneficiario = Beneficiarios::find($id);
        if($cliente != null){
            $error = '0';
            $beneficiario->id_contrato = $request->id_contrato;
            $beneficiario->nombre = $request->nombre;
            $beneficiario->calle = $request->calle;
            $beneficiario->no_exterior = $request->no_exterior;
            $beneficiario->no_interior = $request->no_interior;
            $beneficiario->colonia = $request->colonia;
            $beneficiario->municipio = $request->municipio;
            $beneficiario->ciudad = $request->ciudad;
            $beneficiario->estado = $request->estado;
            $beneficiario->codigo_postal = $request->codigo_postal;
            $beneficiario->parentesco = $request->parentesco;
            $beneficiario->email = $request->email;
            $beneficiario->telefono = $request->telefono;
            $beneficiario->orden = $request->orden;

            $beneficiario->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $beneficiario));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beneficiario = Beneficiarios::find($id);

        if($beneficiario != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('beneficiarios')->where('id', $id)->get();

        if($activo[0]->bactivo == false){
            \DB::table('beneficiarios')->where('id', $id)->update(array('bactivo' => true));
            $mensaje = 'El registro ha sido activado';
            $beneficiario = Beneficiarios::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $beneficiario));
        }
        if($activo[0]->bactivo == true){
            \DB::table('beneficiarios')->where('id', $id)->update(array('bactivo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $beneficiario = Beneficiarios::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $beneficiario));
        }
    }
}
