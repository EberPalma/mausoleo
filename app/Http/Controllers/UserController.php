<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $user = \DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'ap_paterno' => $request->ap_paterno,
                'ap_materno' => $request->ap_materno,
                'username' => $request->username,
                'email' => $request->email
            ]);
        
        return redirect()->back();
    }

    public function newPassword(Request $request, $id){
        $user = \DB::table('users')->where('id', $id)->select('password')->get();
        $request->validate([
            'password' => 'required|string',
            'new_password' => 'required|string',
            'conf_password' => 'required|string|same:new_password'
        ]);
        //return $user[0]->password;
        if(Hash::check($request->password, $user[0]->password)){
            $user = \DB::table('users')
                ->where('id', $id)
                ->update([
                    'password' => bcrypt($request->new_password),
                    'updated_at' => date('Y-m-d h:i:s')
                ]);
            return redirect()->back();
        }else{
            return "La contraseña no coincide";
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
