<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    function update(Request $request){

        $user = User::where("email", $request->email)->first();
        $user->name = $request->name;
        $user->identification = $request->identification;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->update();

        return response()->json(["success" => true, "message" => "Perfil actualizado"]);

    }

}
