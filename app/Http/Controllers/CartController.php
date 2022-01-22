<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Cart;
use App\Models\ProductFormat;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CartRequest;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\CouponProductFormat;
use Carbon\Carbon;
use Auth;

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

    function addToCart(CartRequest $request){

        try{

            $order = null;
            if(!isset($request->order)){
                $order = $this->createOrder();
            }else{
                $orderModel = Order::where("hash", $request->order)->first();

                if(!$orderModel){
                    $order = $this->createOrder();
                }else{
                    $order = $orderModel->id;
                }

                
            }

            if(Cart::where("order_id", $order)->where("product_format_id", $request->product_format_id)->sum("amount") + $request->amount > ProductFormat::where("id", $request->product_format_id)->first()->stock){
                return response()->json([
                    "success" => false,
                    "msg" => "No puedes añadir más cantidad de éste producto",
                ]);
            }

            $cartModel = Cart::where("order_id", $order)->where("product_format_id", $request->product_format_id)->first();
            if(!is_null($cartModel)){

                $cartModel->amount = $cartModel->amount + $request->amount;
                $cartModel->update();

                return response()->json([
                    "success" => true,
                    "msg" => "Producto actualizado en el carrito",
                    "order" => Order::where("id", $order)->first()->hash
                ]);

            }

            $cart = new Cart;
            $cart->order_id = $order;
            $cart->product_format_id = $request->product_format_id;
            $cart->amount = $request->amount;
            $cart->save();

            return response()->json([
                "success" => true,
                "msg" => "Producto añadido al carrito",
                "order" => Order::where("id", $order)->first()->hash
            ]);

        }catch(\Exception $e){

            Log::error($e);
            return response()->json([
                "success" => false,
                "msg" => "Hubo un problema"
            ], 200);

        }

    }

    function getCart(Request $request){

        $order = Order::where("hash", $request->order_id)->first();
        $cart = Cart::where("order_id", $order->id)->with("productFormat.color", "productFormat.size", "productFormat.product")->get();

        return response()->json($cart);

    }

    function updateCart($cart_id, Request $request){

        $cart = Cart::find($cart_id);
        $cart->amount = $request->amount;
        $cart->update();

    }

    function deleteCart($cart_id, Request $request){

        $cart = Cart::find($cart_id);
        $cart->delete();

        return response()->json([
            "success" => true,
            "msg" => "Producto eliminado del carrito"
        ]);

    }

    function verifyCode(Request $request){

        $coupon = Coupon::where("coupon_code", $request->coupon)->where("end_date", ">=", Carbon::now())->first();
        if(is_null($coupon)){
            return response()->json([
                "success" => false,
                "msg" => "Cupón no es válido"
            ]);
        }

        
        if($coupon->all_users == 0){

            $couponUser = CouponUser::where("coupon_id", $coupon->id)->where("user_id", Auth::user()->id)->where("is_used", false)->first();
            if(is_null($couponUser)){
                return response()->json([
                    "success" => false,
                    "msg" => "Cupón no es válido"
                ]);
            }

        }
        

        $couponProductFormats = CouponProductFormat::where("coupon_id", $coupon->id)->get();

        return response()->json([
            "couponProductFormats" => $couponProductFormats,
            "coupon" => $coupon
        ]);

    }

}
