<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function qr_generate(){
        return QrCode::format('png')->generate('Make me into a QRCODE','../public/Images/QrCode.svg');

    }

    public function index(){
        $data = array();
        $nicho = \DB::table('nichos')
                        ->select('id', 'coordenada', 'familia')
                        ->orderBy('id', 'ASC')
                        ->get();
        foreach($nicho as $n){
            $difuntos = \DB::table('beneficiarios')->where('idNicho', $n->id)->select('id', 'nombre')->get();
            $n->difuntos = $difuntos;
            array_push($data, $n);
        }
        return $data;
    }

}
