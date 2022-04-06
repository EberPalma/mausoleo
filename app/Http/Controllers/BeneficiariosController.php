<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    public function index($activo){
        $data = array();
        $beneficiarios = \DB::table('beneficiarios')
                                ->where('activo', $activo)
                                ->select('id', 'nombre', 'idNicho', 'activo')
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
                                ->where('activo', 1)
                                ->select('id', 'nombre', 'idNicho', 'activo')
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
        $nichos = \DB::table('nichos')->select('id', 'coordenada')->get();
        return view('layouts.difuntos.edit')
            ->with('beneficiario', $beneficiario[0])
            ->with('nichos', $nichos);
    }

    public function update(Request $request, $id){
        $beneficario = \DB::table('beneficiarios')
            ->where('id', $id)
            ->update([
                'nombre' => $request->nombre,
                'fechaNacimiento' => $request->fechaNacimiento,
                'fechaDefuncion' => $request->fechaDefuncion,
                'mensaje' => $request->mensaje,
                'idNicho' => $request->idNicho,
                'updated_at' => date('Y-m-d h:i:s')
            ]);
        $beneficiario = \DB::table('beneficiarios')
            ->where('id', $id)
            ->get();

        if($request->file('foto1') != ''){
                if(\File::exists(public_path("Images/Beneficiary/".$id."_1.jpg"))){
                    \Storage::disk('local')->move($id.'_1.jpg', 'old/'.$id.'_1_'.date('Y-m-d').'.jpg');
                }
                $file = $request->file('foto1');
                $nombre = $beneficiario[0]->id.'_1.'.$file->extension();
                \Storage::disk('local')->put($nombre, \File::get($file));
            }
        if($request->file('foto2') != ''){
                if(\File::exists(public_path("Images/Beneficiary/".$id."_2.jpg"))){
                    \Storage::disk('local')->move($id.'_1.jpg', 'old/'.$id.'_2_'.date('Y-m-d').'.jpg');
                }
                $file = $request->file('foto2');
                $nombre = $beneficiario[0]->id.'_2.'.$file->extension();
                \Storage::disk('local')->put($nombre, \File::get($file));
            }
        if($request->file('foto3') != ''){
                if(\File::exists(public_path("Images/Beneficiary/".$id."_3.jpg"))){
                    \Storage::disk('local')->move($id.'_1.jpg', 'old/'.$id.'_3_'.date('Y-m-d').'.jpg');
                }
                $file = $request->file('foto3');
                $nombre = $beneficiario[0]->id.'_3.'.$file->extension();
                \Storage::disk('local')->put($nombre, \File::get($file));
            }
        return view('layouts.difuntos.edit')
            ->with('beneficiario', $beneficiario[0]);
    }

    public function store(Request $request){

        $beneficiario = \DB::table('beneficiarios')->insert([
            'idNicho' => $request->idNicho,
            'nombre' => $request->nombre,
            'fechaNacimiento' => $request->fechaNacimiento,
            'fechaDefuncion' => $request->fechaDefuncion,
            'mensaje' => $request->mensaje,
            'activo' => 1,
            'created_at' =>  date('Y-m-d h:i:s')
        ]);

        $beneficiario = \DB::table('beneficiarios')->select('id')
            ->where('nombre', $request->nombre)
            ->where('idNicho', $request->idNicho)
            ->get();

        if($request->file('foto1') != ''){
            $file = $request->file('foto1');
            $nombre = $beneficiario[0]->id.'_1.'.$file->extension();
            \Storage::disk('local')->put($nombre, \File::get($file));
        }
        if($request->file('foto2') != ''){
            $file = $request->file('foto2');
            $nombre = $beneficiario[0]->id.'_2.'.$file->extension();
            \Storage::disk('local')->put($nombre, \File::get($file));
        }
        if($request->file('foto3') != ''){
            $file = $request->file('foto3');
            $nombre = $beneficiario[0]->id.'_3.'.$file->extension();
            \Storage::disk('local')->put($nombre, \File::get($file));
        }

        return view('layouts.nichos.index');
    }

    public function destroy($id){
        $activo = \DB::table('beneficiarios')->where('id', $id)->select('activo')->get();
        $beneficiario = \DB::table('beneficiarios')->where('id', $id)->update(['activo' => $activo[0]->activo == 0 ? 1 : 0]);
    }
}
