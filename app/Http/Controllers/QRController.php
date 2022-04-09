<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QRController extends Controller
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
        return view('layouts.codigosqr.index')
            ->with('codigos', $data);
    }

    public function descargar($id){
        $nicho = \DB::table('nichos')->where('id', $id)->get();
        $difuntos = \DB::table('beneficiarios')->where('idNicho', $nicho[0]->id)->select('id', 'nombre')->get();
        return view('layouts.codigosqr.descargar')
            ->with('nicho', $nicho[0])
            ->with('difuntos', $difuntos);
    }

}
