<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function qr_generate(){
        return QrCode::format('png')->generate('Make me into a QRCODE','../public/Images/QrCode.svg');

    }

}
