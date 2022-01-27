<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PerfilUpdateRequest;
use App\User;

class PerfilController extends Controller
{

    function index(){
        return view("perfil");
    }

    function update(PerfilUpdateRequest $request){

        try{

            if(User::where("identification", $request->identification)->where("id", "<>", \Auth::user()->id)->count() > 1){

                return response()->json(["success" => false, "msg" => "Esta cédula ya está registrada"]);

            }else{

                $user = User::where("id", \Auth::user()->id)->first();
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->identification = $request->identification;
                $user->update();

                return response()->json(["success" => true, "msg" => "Perfil actualizado"]);

            }

        }catch(\Exception $e){
            return response()->json(["success" => true, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
