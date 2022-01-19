<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cat_usu;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filtro)
    {
        $activo = 0;
        if($filtro == "activo"){
            $activo = 1;
        }else if($filtro == 'todos'){
            $activo = 0;
        }
        $user = \DB::table('users')
                        ->select('id', 'name', 'ap_paterno', 'ap_materno', 'created_at', 'email', 'username', 'rol')
                        ->where('activo', $activo)
                        ->orderBy('created_at')
                        ->get();

        if($user != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $user));
    }

    public function editar($id){
        return $id;
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
            'username' => 'required|string|unique:cat_usu',
            'email' => 'required|email|unique:cat_usu',
            'password' => 'required|string',
            'conf_password' => 'required|string|same:password',
            'name' => 'required|string',
            'ap_paterno' => 'required|string',
            'ap_materno' => 'required|string',
        ]);

        try{
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => $request->nombre,
                'ap_paterno' => $request->ap_paterno,
                'ap_materno' => $request->ap_materno,
                'activo' => 1
            ]);
            $mensaje = "registro realizado correctamente";
            $error = '0';
        }catch(\Exception $ex){
            $mensaje = $ex->getMessage();
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        if($user != null){
            $mensaje = "Ok";
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $user));
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
            'username' => 'nullable|string|unique:cat_usu',
            'email' => 'required|email|unique:cat_usu',
            'name' => 'required|string',
            'ap_paterno' => 'required|string',
            'ap_materno' => 'required|string',
        ]);

        $user = User::find($id);
        if($user != null){
            $error = '0';
            $user->name = $request->name;
            $user->email = $request->email;
            $user->ap_paterno = $request->ap_paterno;
            $user->ap_materno = $request->ap_materno;

            $user->save();
            $mensaje = "Informacion actualizada corectamente";
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($user->activo == 1){
            $user->activo = 0;
            $user->save();
            return $user;
        }else{
            $user->activo = 1;
            $user->save();
            return $user;
        } 
    }
}
