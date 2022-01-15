<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    
    function sendMessage(ContactRequest $request){

        try{    

            \Mail::send("emails.contact", ["name" => $request->name, "phone" => $request->phone, "email" => $request->email, "messageMail" => $request->text], function($message) {

                $message->to(env("MAIL_FROM_ADDRESS"), "Admin")->subject("Tienes un nuevo mensaje!");
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

            return response()->json([
                "success" => true,
                "msg" => "Mensaje enviado exitosamente"
            ], 200);

        }catch(\Exception $e){

            Log::error($e);
            return response()->json([
                "success" => false,
                "msg" => "Hubo un problema"
            ], 200);

        }

    }

}
