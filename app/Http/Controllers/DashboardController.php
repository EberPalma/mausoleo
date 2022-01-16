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

    public function countDashboardItems(){
        $nichos = \DB::table('nichos')->count();
        $contacto  = \DB::table('contacto')->count();
        $beneficiearios  = \DB::table('beneficiarios')->count();

        return array([]);
    }
}
