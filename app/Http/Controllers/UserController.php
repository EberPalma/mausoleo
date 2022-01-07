<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cat_usu;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \DB::table('users')
                        ->select('id', 'name', 'ap_paterno', 'ap_materno', 'created_at', 'email', 'username', 'id_rol')
                        ->where('activo', 1)
                        ->orderBy('created_at')
                        ->get();
        foreach($user as $u){
            $id_rol = \DB::table('cat_rol')
                        ->select('nombre')
                        ->where('id', $u->id_rol)
                        ->get();
            $u->id_rol = $id_rol[0];
        }

        if($user != null){
            $mensaje = 'Ok';
            $error = '0';
        }else{
            $mensaje = 'No se puede obtener la informacion';
            $error = '1';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $user));
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
            'nombre' => 'required|string',
            'ap_paterno' => 'required|string',
            'ap_materno' => 'required|string',
            'id_rol' => 'required|integer',
        ]);

        try{
            $user = Cat_usu::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'nombre' => $request->nombre,
                'ap_paterno' => $request->ap_paterno,
                'ap_materno' => $request->ap_materno,
                'id_rol' => $request->id_rol,
                'fecha_creado' => date('Y/m/d H:i:s'),
                'ultima_visita' => date('Y/m/d H:i:s'),
                'activo' => 1,
                'borrado' =>0
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
        $user = Cat_usu::find($id);
        
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
            'nombre' => 'required|string',
            'ap_paterno' => 'required|string',
            'ap_materno' => 'required|string',
            'id_rol' => 'required|integer',
        ]);

        $user = Cat_usu::find($id);
        if($user != null){
            $error = '0';
            $user->nombre = $request->nombre;
            $user->email = $request->email;
            $user->ap_paterno = $request->ap_paterno;
            $user->ap_materno = $request->ap_materno;
            $user->id_rol = $request->id_rol;

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
        $user = Cat_usu::find($id);

        if($user != null){
            $error = '0';
        }else{
            $mensaje = "No se encontro registro";
            $error = '1';
        }

        $activo = \DB::table('cat_usu')->where('id', $id)->get();

        if($activo[0]->activo == false){
            \DB::table('cat_usu')->where('id', $id)->update(array('activo' => true));
            $mensaje = 'El registro ha sido activado';
            $user = Cat_usu::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $user));
        }
        if($activo[0]->activo == true){
            \DB::table('cat_usu')->where('id', $id)->update(array('activo' => false));
            $mensaje = 'El registro ha sido desactivado';
            $user = Cat_usu::find($id);
            return json_encode(array('message' => $mensaje, 'errors' => $error, 'data' => $user));
        }
    }
}
