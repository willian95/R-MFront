<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Cart;

class CartController extends Controller
{
    
    function createOrder(){

        $order = new Order;
        if(\Auth::check()){
            $order->user_id = \Auth::user()->id;
        }

        $order->hash = uniqid();
        $order->save();

        return $order->id;

    }

    function addToCart(Request $request){

        $order = null;
        if(!isset($request->order)){
            $order = $this->createOrder();
        }else{
            $orderModel = Order::where("hash", $request->order)->first();

            if(!$orderModel){
                return response()->json(["success" => false, "msg" => "Número de orden no encontrado"]);
            }

            $order = $orderModel->id;
        }

        $cart = new Cart;
        $cart->order_id = $order;
        $cart->product_id = $request->product_id;
        $cart->amount = $request->amount;
        $cart->save();

    }

}
