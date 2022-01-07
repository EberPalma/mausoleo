<?php

namespace App\Http\Controllers\session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//Modelos para administrar la sesion
use App\Models\cat_usu;
use App\Models\log_acesso;
use App\Models\cat_rol;

class SessionController extends Controller
{
    public function login(Request $request){
        
        $user = Cat_usu::where('username', $request->username)->first();
        if($user != null){
            if(Hash::check($request->get('password'), $user->password)){
                $acceso = \DB::table('log_acceso')->insert([
                    'username' => $user->username,
                    'nombre_completo' => $user->nombre.' '.$user->ap_paterno.' '.$user->ap_materno,
                    'dfecha_visita' => date('Y/m/d H:i:s'),
                    'id_rol' => $user->id_rol,
                    'id_usu' => $user->id,
                    'session' => "open"
                ]);
                $acceso = \DB::table('log_acceso')
                                ->select('id', 'session')
                                ->where('id_usu', '=', $user->id)
                                ->where('session', "=", 'open')
                                ->limit(1)
                                ->get();
                $rol = \DB::table('cat_rol')
                                ->select('nombre')
                                ->where('id', $user->id_rol)
                                ->limit(1)
                                ->get();
                
                $date_session =  Cat_usu::where('id', $user->id)
                                            ->update(array('ultima_visita' => date('Y/m/d H:i:s')));
                

                $mensaje = 'Ok';
                $error = '1';
                $session = array(
                    'id_user' => $user->id,
                    'username' => $user->username,
                    'fullname' => $user->nombre.' '.$user->ap_paterno.' '.$user->ap_materno,
                    'id_sesion' => $acceso[0]->id,
                    'status' => $acceso[0]->session,
                    'type' => $rol[0]->nombre
                );
            }else{
                $error = "0";
                $mensaje = "La contraseña no coincide";
                $session = array(
                    'status' => 'close'
                );
            }
        }else{
            $error = "0";
            $mensaje = "No se encontro el usuario";
            $session = array(
                'status' => 'close'
            );
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'session' => $session));
    }

    public function logout(Request $request){

        //$close_all = \DB::table('log_acceso')->update(array('session' => 'close'));

        $session_info = $request->session;

        $close_session = \DB::table('log_acceso')
                                ->where('id', $session_info['id_sesion'])
                                ->update(array('session' => 'close'));
        $mensaje = 'Sesion cerrada';
        $error = '1';
        $session = array(
            'status' => 'close'
        );

        return json_encode(array('message' => $mensaje, 'errors' => $error, 'session' => $session));
    }

    /**
     * Funcion que permite cambiar la contraseña de un usuario
     * segun el id proporcionado
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $id){
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|different:old_password',
            'conf_password' => 'required|string|same:password'
        ]);
        $user = Cat_usu::find($id);
        if(Hash::check($request->get('old_password'), $user->password)){
            $user->password = bcrypt($request->password);
            $user->save();

            $mensaje = 'Ok';
            $error = '1';
        }else{
            $mensaje = 'Las contraseñas no coinciden';
            $error = '0';
        }

        return json_encode(array('message' => $mensaje, 'errors' => $error));
    }

}
