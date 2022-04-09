<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function index(){
        $data = array();
        $nicho = \DB::table('nichos')
                        ->where('activo', 1)
                        ->select('id', 'coordenada', 'capacidad', 'nombre', 'familia')
                        ->orderBy('id', 'ASC')
                        ->get();
        foreach($nicho as $n){
            $difuntos = \DB::table('beneficiarios')->where('idNicho', $n->id)->where('activo', 1)->select('id', 'nombre','fechaNacimiento','fechaDefuncion')->get();
            $n->difuntos = $difuntos;
            array_push($data, $n);
        }
        return view('layouts.guest.presentacion')
            ->with('nichos', $data);
    }

    public function indexjson(){
        $data = array();
        $nicho = \DB::table('nichos')
                        ->where('activo', 1)
                        ->select('id', 'coordenada', 'capacidad', 'nombre', 'familia')
                        ->orderBy('id', 'ASC')
                        ->get();
        foreach($nicho as $n){
            $difuntos = \DB::table('beneficiarios')->where('idNicho', $n->id)->where('activo', 1)->select('id', 'nombre')->get();
            $n->difuntos = $difuntos;
            array_push($data, $n);
        }
        return response()->json($data,200,[]);
    }
}
