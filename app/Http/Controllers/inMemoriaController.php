<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inMemoriaController extends Controller
{
    public function today(){

        date_default_timezone_set('America/Mexico_City');
        $dia = date('d');
        $mes = date('m');
        if($dia == 10 | $dia == 20 | $dia == 30){
            $dia = $dia;
        }else {
            $dia = str_replace("0", "", $dia);
        }
        $mes = $mes == 10 ? $mes : str_replace("0", "", $mes);
        $date = $dia.'/'.$mes;
        $defuncion = \DB::table('beneficiarios')->where('fechaDefuncion', 'like', '%'.$date.'%')->get();
        $nacimiento = \DB::table('beneficiarios')->where('fechaNacimiento', 'like', '%'.$date.'%')->get();
        return view('layouts.guest.Hoy')
            ->with('defuncion', $defuncion)
            ->with('nacimiento', $nacimiento);
    }

    public function thisMonth(){
        $date = date("/m/");
        $date = $date == 10 ? $date : str_replace('0', '', $date);
        //return $date;
        $defuncion = \DB::table('beneficiarios')->where('fechaDefuncion', 'like', '%'.$date.'%')->get();
        $nacimiento = \DB::table('beneficiarios')->where('fechaNacimiento', 'like', '%'.$date.'%')->get();
        return view('layouts.guest.Mes')
            ->with('defuncion', $defuncion)
            ->with('nacimiento', $nacimiento);
    }
}
