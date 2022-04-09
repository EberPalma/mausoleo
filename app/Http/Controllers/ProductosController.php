<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        $productos = \DB::table('productos')->select('nombre', 'titulo', 'descripcion', 'oferta', 'precio')->get();
        return $productos;
    }

    public function show($id){
        $producto = \DB::table('productos')->where('id', $id)->get();
        return $producto[0];
    }

    public function store(Request $request){

        $producto = \DB::table('productos')->insert([
            'nombre' => $request->nombre,
            'titulo' => $request->titulo,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion,
            'existencias' => $request->existencias,
            'precio' => $request->precio,
            'oferta' => $request->oferta,
            'porcentaje_oferta' => $request->porcentaje_oferta,
            'created_at' => date('Y-m-d h:i:s')
        ]);

        if($request->file('foto') != ''){
            $file = $request->file('foto');
            $nombre = $request->id.'.'.$file->extension();
            \Storage::disk('local')->put($nombre, \File::get($file));
        }
    }

    public function update(Request $request, $id){
        $producto = \DB::table('productos')->where('id', $id)->get();

        $producto->update([
            'nombre' => $request->nombre,
            'titulo' => $request->titulo,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion,
            'existencias' => $request->existencias,
            'precio' => $request->precio,
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }

    public function setOferta(Request $request, $id){
        $producto = \DB::table('productos')->where('id', $id)->get();

        $oferta = $producto[0]->oferta;
        $producto->update(['oferta' => $oferta == 1 ? 0 : 1, 'porcentaje_oferta' => $request->porcentaje_oferta]);
    }
}
