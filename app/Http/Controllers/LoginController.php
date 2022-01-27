<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    function login(LoginRequest $request){

        try{

            $user = User::where("email", $request->email)->first();
            if($user){

                if($user->email_verified_at == null){
                    return response()->json(["success" => false, "msg" => "Aún no has autenticado tu correo"]);    
                }

            }else{
                return response()->json(["success" => false, "msg" => "Usuario no encontrado"]);
            }

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
                return response()->json(["success" => true, "msg" => "Usuario autenticado", "role_id" => Auth::user()->role_id]);
            }

            return response()->json(["success" => false, "msg" => "Usuario no encontrado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function checkAuth(){

        return response()->json(["success" => \Auth::check()]);

    }

    function logout(){
        \Auth::logout();
        return redirect()->to("/");
    }
}
