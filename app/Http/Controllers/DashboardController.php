<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countNichos(){
        $nichos = \DB::table('nichos')->get()->count();
        return $nichos;
    }

    public function countHuespedes(){
        $huespedes = \DB::table('huespedes')->get()->count();
        return $huespedes;
    }

    public function countContacto(){
        $huespedes = \DB::table('contacto')->get()->count();
        return $huespedes;
    }
}
