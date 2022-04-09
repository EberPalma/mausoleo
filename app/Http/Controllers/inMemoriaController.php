<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inMemoriaController extends Controller
{
    public function today(){
        $date = date('d/m');
        $date = str_replace('0', '', $date);
        //return $date;
        $difuntos = \DB::table('beneficiarios')->where('fechaDefuncion', 'like', '%'.$date.'%')->get();
        return $difuntos;
    }

    public function thisMonth(){
        $date = date("/m/");
        $date = str_replace('0', '', $date);
        //return $date;
        $difuntos = \DB::table('beneficiarios')->where('fechaDefuncion', 'like', '%'.$date.'%')->get();
        return $difuntos;
    }
}
