<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    function fetch(Request $request){

        try{

            $orders = Order::where("user_id", \Auth::user()->id)->get();

            if($orders){

                $ordersArray = [];

                foreach($orders as $order){

                    $ordersArray[] = [
                        $order->hash
                    ];

                }

            }

            $shoppings = Payment::whereIn("order_id", $ordersArray)->with("productPurchases", "productPurchases.productFormat", "productPurchases.productFormat.product", "productPurchases.productFormat.size", "productPurchases.productFormat.color")->has("productPurchases")
            ->has("productPurchases.productFormat")->has( "productPurchases.productFormat.product")->has( "productPurchases.productFormat.size")->orderBy('id', 'desc')->paginate(20);

            return response()->json($shoppings);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }
}
