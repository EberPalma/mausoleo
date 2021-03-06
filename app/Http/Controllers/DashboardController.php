<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countNichos(){
        $nichos = \DB::table('nichos')->count();
        return $nichos;
    }

    public function countHuespedes(){
        $beneficiearios  = \DB::table('beneficiarios')->count();
        return $beneficiearios;
    }

    public function countContacto(){
        $contacto  = \DB::table('contacto')->count();
        return $contacto;
    }

    public function countInformes(){
        $contacto  = \DB::table('contacto')->where('asunto', 'Informes')->count();
        return $contacto;
    }

    public function countQuejas(){
        $contacto  = \DB::table('contacto')->where('asunto', 'Quejas')->count();
        return $contacto;
    }

    public function countOtros(){
        $contacto  = \DB::table('contacto')->where('asunto', 'Sugerencias')->count();
        return $contacto;
    }
}
