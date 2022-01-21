<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class CheckoutController extends Controller
{
    
    function signing(Request $request){

        $reference = uniqid();
        $concatString = $reference.($request->total*100).$request->currency.env('WOMPI_INTEGRITY_KEY');
        $signature = hash ("sha256", $concatString);

        return response()->json(["signature" => $signature, "reference" => $reference]);

    }

    function webhook(Request $request){

        Log::info($request->all());

    }

    function store(){



    }

}
