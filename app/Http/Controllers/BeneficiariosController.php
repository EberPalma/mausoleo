<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    public function index($activo){
        $data = array();
        $beneficiarios = \DB::table('beneficiarios')
                                ->where('activo', $activo)
                                ->select('id', 'nombre', 'idNicho')
                                ->get();
        foreach($beneficiarios as $beneficiario){
            $nicho = \DB::table('nichos')
                                ->select('familia', 'coordenada')
                                ->where('id', $beneficiario->idNicho)
                                ->get();
            $beneficiario->familia = $nicho[0]->familia;
            $beneficiario->coordenada = $nicho[0]->coordenada;
            array_push($data, $beneficiario);
        }

        return $data;
    }

    public function busqueda($filtro){
        $data = array();
        $beneficiarios = \DB::table('beneficiarios')
                                ->where('nombre', 'like', '%'.$filtro.'%')
                                ->select('id', 'nombre', 'idNicho')
                                ->get();
        foreach($beneficiarios as $beneficiario){
            $nicho = \DB::table('nichos')
                                ->select('familia', 'coordenada')
                                ->where('id', $beneficiario->idNicho)
                                ->get();
            $beneficiario->familia = $nicho[0]->familia;
            $beneficiario->coordenada = $nicho[0]->coordenada;
            array_push($data, $beneficiario);
        }
        return $data;
    }

    public function edit($id){
        $beneficiario = \DB::table('beneficiarios')->where('id', $id)->get();
        return view('layouts.difuntos.edit')
            ->with('beneficiario', $beneficiario[0]);
    }

    public function update(Request $request, $id){
        $beneficario = \DB::table('beneficiarios')
            ->where('id', $id)
            ->update([
                'nombre' => $request->nombre,
                'fechaNacimiento' => $request->fechaNacimiento,
                'fechaDefuncion' => $request->fechaDefuncion,
                'mensaje' => $request->mensaje,
                'updated_at' => date('Y-m-d h:i:s')
            ]);
        $beneficiario = \DB::table('beneficiarios')
            ->where('id', $id)
            ->get();
        return view('layouts.difuntos.edit')
            ->with('beneficiario', $beneficiario[0]);
    }

    public function store(Request $request){
        $nicho = \DB::table('nichos')
            ->select('id')
            ->where('coordenada', $request->idNicho)
            ->get();


        $beneficiario = \DB::table('beneficiarios')->insert([
            'idNicho' => $nicho[0]->id,
            'nombre' => $request->nombre,
            'fechaNacimiento' => $request->fechaNacimiento,
            'fechaDefuncion' => $request->fechaDefuncion,
            'mensaje' => $request->mensaje,
            'activo' => 1,
            'created_at' => date('Y-m-d h:i:s')
        ]);
    }

    public function destroy($id){
        $activo = \DB::table('beneficiarios')->where('id', $id)->select('activo')->get();
        $beneficiario = \DB::table('beneficiarios')->where('id', $id)->update(['activo' => $activo[0]->activo == 0 ? 1 : 0]);
    }
}