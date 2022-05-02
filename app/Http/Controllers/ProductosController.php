<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        $productos = \DB::table('productos')->select('id','nombre', 'titulo', 'description', 'oferta', 'precio')->get();
        return view('layouts.promociones.index')->with('productos', $productos);
    }

    public function show($id){
        $producto = \DB::table('productos')->where('id', $id)->get();
        return view('layouts.promociones.edit')->with( 'producto' , $producto[0]);
    }

    public function store(Request $request){
        $fecha = date('Y-m-d h:i:s');

        $producto = \DB::table('productos')->insert([
            'nombre' => $request->nombre,
            'titulo' => $request->titulo,
            'description' => $request->descripcion,
            'existencias' => $request->existencias,
            'precio' => $request->precio,
            'oferta' => $request->oferta,
            'porcentaje_oferta' => $request->porcentaje_oferta,
            'created_at' => $fecha,
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        $producto = \DB::table('productos')->select('id')->where('created_at', $fecha)->get();

        if($request->file('foto1') != ''){
            $file = $request->file('foto1');
            $nombre = $producto[0]->id.'.'.$file->extension();
            \Storage::disk('local')->put('/Promociones/'.$nombre, \File::get($file));
        }
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $producto = \DB::table('productos')->where('id', $id)->get();


        $producto->update([
            'nombre' => $request->nombre,
            'titulo' => $request->titulo,
            'description' => $request->descripcion,
            'existencias' => $request->existencias,
            'precio' => floatval($request->precio),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        $id = $producto[0]->id;

        if($request->file('foto1') != ''){
            if(\File::exists(public_path("Images/Beneficiary/Promociones/".$id.".jpg"))){
                \Storage::disk('local')->move($id.'_1.jpg', '/Promociones/old/'.$id.'_'.date('Y-m-d').'.jpg');
            }
            $file = $request->file('foto1');
            $nombre = $id.'.'.$file->extension();
            \Storage::disk('local')->put('Promociones'.$nombre, \File::get($file));
        }


    }

    public function setOferta(Request $request, $id){
        $producto = \DB::table('productos')->where('id', $id)->get();

        $oferta = $producto[0]->oferta;
        $producto->update(['oferta' => $oferta == 1 ? 0 : 1, 'porcentaje_oferta' => $request->porcentaje_oferta]);
    }

    public function deleteImage($id){
        if(\File::exists(public_path("Images/Beneficiary/Promociones/".$id.".jpg"))){
            \Storage::disk('local')->move($id.'_1.jpg', '/Promociones/old/'.$id.'_'.date('Y-m-d').'.jpg');
            return redirect()->back();
        }else{
            return redirect()->back()->with('alert', 'No se encontro la imagen!');
        }
    }
}
