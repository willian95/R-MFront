<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\Models\User;

class RegisterController extends Controller
{
    function register(RegisterRequest $request){

        try{

            $hash = Str::random(32).uniqid();

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->identification = $request->identification;
            $user->register_code = $hash;
            $user->save();

            $to_name = $user->name;
            $to_email = $user->email;
            $data = ["user" => $user, "hash" => $hash];

            \Mail::send("emails.register", $data, function($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)->subject("Bienvenido/a! Solo falta un paso para tu registro en Aromantica!");
                $message->from("ventas@aromantica.co", env("MAIL_FROM_NAME"));

            });

            return response()->json(["success" => true, "msg" => "Te has registrado exitosamente, verifica tu correo para validar tu email"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function check($hash){

        try{

            $user = User::where("register_code", $hash)->first();
            if($user){

                $user->email_verified_at = Carbon::now();
                $user->register_code = "";
                $user->update();

                Auth::loginUsingId($user->id);
                return redirect()->to("/");

            }else{

                echo "Este código no existe";

            }

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }
}
