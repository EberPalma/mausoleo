<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NichosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($activo)
    {
        $data = array();
        $nicho = \DB::table('nichos')
                        ->where('activo', $activo)
                        ->select('id', 'coordenada', 'capacidad', 'nombre', 'familia', 'activo')
                        ->orderBy('id', 'ASC')
                        ->get();
        foreach($nicho as $n){
            $difuntos = \DB::table('beneficiarios')->where('idNicho', $n->id)->where('activo', 1)->select('id', 'nombre')->get();
            $n->difuntos = $difuntos;
            array_push($data, $n);
        }
        return $data;
    }

    public function buscar($filtro){
        $data = array();
        $nicho = \DB::table('nichos')
                        ->where('coordenada', 'like', '%'.$filtro.'%')
                        ->select('id', 'coordenada', 'capacidad', 'nombre', 'familia', 'activo')
                        ->get();
        foreach($nicho as $n){
            $difuntos = \DB::table('beneficiarios')->where('idNicho', $n->id)->where('activo', 1)->select('nombre')->get();
            $n->difuntos = $difuntos;
            array_push($data, $n);
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coordenada'=>'required|string',
            'capacidad'=>'required|integer',
            'nombre'=>'required|string',
            'familia'=>'required|string',
            'email'=>'required|string'
        ]);

        try{
            $nicho = \DB::table('nichos')
                            ->insert([
                                'coordenada' => $request->coordenada,
                                'capacidad' => $request->capacidad,
                                'nombre' => $request->nombre,
                                'familia' => $request->familia,
                                'email' => $request->email,
                                'activo' => 1,
                                'created_at' => date('Y-m-d h:i:s')
                            ]);
            $mensaje = "Registro realizado correctamente";
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        return json_encode(array('message' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nicho = \DB::table('nichos')->where('id', $id);

        if($nicho != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $nicho));
    }

    public function edit($id){
        $nicho = \DB::table('nichos')->where('id', $id)->get();
        $difuntos = \DB::table('beneficiarios')->where('idNicho', $nicho[0]->id)->select('id', 'nombre')->get();
        return view('layouts.nichos.edit')
            ->with('nicho', $nicho[0])
            ->with('difuntos', $difuntos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'coordenada'=>'required|string',
            'capacidad'=>'required|integer',
            'nombre'=>'required|string',
            'familia'=>'required|string',
            'email'=>'required|string'
        ]);

        if(\DB::table('nichos')->where('id', $id) != null){
            $error = '0';

           \DB::table('nichos')->where('id', $id)
                            ->update([
                                'coordenada' => $request->coordenada,
                                'capacidad' => $request->capacidad,
                                'nombre' => $request->nombre,
                                'familia' => $request->familia,
                                'email' => $request->email,
                                'updated_at' => date('Y-m-d h:i:s')
                            ]);

            return "Informacion actualizada correctamente";
        }else{
            return "No se encontro registro";

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nicho = \DB::table('nichos')->where('id', $id)->get();
        if($nicho != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }
        $activo = $nicho[0]->activo;
        $antCoordenada = $nicho[0]->coordenada;
        $coordenada = strlen($antCoordenada) > 9 ? substr($antCoordenada, 10, strlen($antCoordenada)): "Anterior: ".$nicho[0]->coordenada;

        $nicho = \DB::table('nichos')->where('id', $id)->update(['coordenada' => $coordenada,'activo' => $activo == 1 ? 0 : 1]);
        $nicho = \DB::table('nichos')->where('id', $id)->get();
        return json_encode(array( 'errors' => $error, 'data' => $nicho));
    }
    public function informacion($coordenada){
        $newCoordenada = "";
        if(is_numeric($coordenada)){
            $nicho = \DB::table('nichos')->where('id', $coordenada)->get();
            $difuntos = \DB::table('beneficiarios')->where('idNicho', $nicho[0]->id)->where('activo', 1)->select('id', 'nombre','fechaDefuncion','fechaNacimiento','mensaje')->get();
            if(count($difuntos) != 0){
                $newDifuntos = array();
                foreach($difuntos as $difunto){
                   $condolencias = \DB::table('condolencias')->where('idBeneficiario','=', $difunto->id)->where('verificado', 1)->select('id', 'nombre', 'mensaje', 'relacion','created_at')->get();
                   $difunto->condolencias = $condolencias;
                   array_push($newDifuntos, $difunto);
                }
               
               return view('layouts.guest.Informacion')
                   ->with('nicho', $nicho)
                   ->with('difuntos', $newDifuntos);
            }
            return view('layouts.guest.Informacion')
                ->with('nicho', $nicho)
                ->with('difuntos', $difuntos);
        }
        for($i = 0; $i<strlen($coordenada); $i++){
            if(is_numeric($coordenada[$i]) && !is_numeric($coordenada[$i-1])){
                 $newCoordenada = $newCoordenada.' '.$coordenada[$i];
            }else{
                $newCoordenada = $newCoordenada.$coordenada[$i];
            }
        }
        $nicho = \DB::table('nichos')->where('coordenada', $newCoordenada)->get();
         $difuntos = \DB::table('beneficiarios')->where('idNicho', $nicho[0]->id)->select('id', 'nombre','fechaDefuncion','fechaNacimiento','mensaje')->get();
         if(count($difuntos)!=0){
             $newDifuntos = array();
             foreach($difuntos as $difunto){
                $condolencias = \DB::table('condolencias')->where('idBeneficiario','=', $difunto->id)->where('verificado', 1)->select('id', 'nombre', 'mensaje', 'relacion','created_at')->get();
                $difunto->condolencias = $condolencias;
                array_push($newDifuntos, $difunto);
             }
            
             return $newDifuntos;
            return view('layouts.guest.Informacion')
                ->with('nicho', $nicho)
                ->with('difuntos', $newDifuntos);
        }
        return view('layouts.guest.Informacion')
            ->with('nicho', $nicho)
            ->with('difuntos', $difuntos);
    }
    public function informacion_t(){
        $data = array();
        $nichos = \DB::table('nichos')->get();
        foreach($nichos as $nicho){
            $difuntos = \DB::table('beneficiarios')->where('idNicho', $nicho->id)->select('id', 'nombre','fechaDefuncion','fechaNacimiento')->get();
            foreach($difuntos as $difunto){
                $condolencias = \DB::table('condolencias')->where('idBeneficiario','=', $difunto->id)->where('verificado', 1)->select('id', 'nombre', 'mensaje', 'relacion','created_at')->get();
                $difunto->condolencias = $condolencias;
            }
            $nicho->difuntos = $difuntos;
            array_push($data, $nicho);
        }
        return $data;
    }
}


