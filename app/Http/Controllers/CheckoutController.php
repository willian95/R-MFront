<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutStoreRequest;
use App\Models\Payment;
use App\Models\ProductFormat;
use Log;
use DB;

class CheckoutController extends Controller
{
    
    function signing(Request $request){

        $reference = uniqid();
        $concatString = $reference.($request->total*100).$request->currency.env('WOMPI_INTEGRITY_KEY');
        $signature = hash ("sha256", $concatString);

        return response()->json(["signature" => $signature, "reference" => $reference]);

    }

    function webhook(Request $request){

        try{
            Log::info($request->all());
            DB::beginTransaction();

            $payment = Payment::where("wompi_reference", $request->data->transaction->reference)->first();

            if(!is_null($payment)){

                $payment->status = $payment->data->transaction->status;
                $payment->update();

                DB::commit();
            }
           

        }catch(\Exception $e){

            DB::rollBack();

            Log::error($e);

        }

    }

    function store(CheckoutStoreRequest $request){

        try{

            DB::beginTransaction();

            $payment = new Payment;
            $payment->order_id = $request->order_id;
            $payment->wompi_reference = $request->wompi_reference;
            $payment->name = $request->name;
            $payment->phone = $request->phone;
            $payment->address = $request->address;
            $payment->save();

            $this->storeProducts($request, $payment);

            DB::commit();
            return response()->json([
                "success" => true,
                "message" => "Compra guardada"
            ], 200);

        }catch(\Exception $e){

            DB::rollBack();

            Log::error($e);
            return response()->json([
                "success" => false,
                "message" => "Hubo un error"
            ], 200);

        }

    }

    function storeProducts($request, $payment){

        foreach($request->products as $product){

            $productFormat = new ProductFormat;
            $productFormat->product_format_id = $product->product_format_id;
            $productFormat->price = $productFormat->price;
            $productFormat->amount = $productFormat->amount;
            $productFormat->payment_id = $payment->id;
            $productFormat->save();

        }

    }

}
