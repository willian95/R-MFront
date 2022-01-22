<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutStoreRequest;
use App\Models\Payment;
use App\Models\ProductPurchase;
use App\Models\ProductFormat;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Cart;
use App\Models\Order;
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

        $payment = Payment::where("wompi_reference", $request["data"]["transaction"]["reference"])->first();

        if(!is_null($payment)){

            $payment->status = $request["data"]["transaction"]["status"];
            $payment->update();

            CouponUser::where("payment_id", $payment->id)->update(["is_used" => true]);
            $orderId = Order::where("hash", $payment->order_id)->first()->id;
            foreach(Cart::where("order_id", $orderId)->get() as $cart){

                $cartModel = Cart::where("id", $cart->id)->first();
                $cartModel->delete();

            }

            foreach(ProductPurchase::where("payment_id", $payment->id)->get() as $productPurchase){

                $this->updateProductFormatsAmount($productPurchase->product_format_id, $productPurchase->amount);
                $this->updateCartsAmount($productPurchase->product_format_id);

            }


            
            $this->adminSendMail($payment, $payment->status);
            $this->userSendMail($payment, $payment->status);

        }
           

    }

    function adminSendMail($payment,$status){

        try{    

            \Mail::send("emails.purchaseAdmin", ["name" => $payment->name, "phone" => $payment->phone, "email" => $payment->email, "address" => $payment->address, "products" => ProductPurchase::where("payment_id", $payment->id)->with("productFormat", "productFormat.product", "productFormat.color", "productFormat.size")->get(), "total" => $payment->total_products + $payment->shipping_price, "status" => $status, "wompi_reference" => $payment->wompi_reference], function($message) {

                $message->to(env("MAIL_FROM_ADDRESS"), "Admin")->subject("Tienes una nueva venta!");
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

        }catch(\Exception $e){

            Log::error($e);

        }

    }
    
    function userSendMail($payment, $status){

        try{    

            \Mail::send("emails.purchaseClient", ["name" => $payment->name, "phone" => $payment->phone, "email" => $payment->email, "address" => $payment->address, "products" => ProductPurchase::where("payment_id", $payment->id)->with("productFormat", "productFormat.product", "productFormat.color", "productFormat.size")->get(),"total" => $payment->total_products + $payment->shipping_price, "status" => $status, "wompi_reference" => $payment->wompi_reference], function($message) {

                $message->to(env("MAIL_FROM_ADDRESS"), "Admin")->subject("Has realizado una compra!");
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

        }catch(\Exception $e){

            Log::error($e);

        }

    }

    function updateProductFormatsAmount($product_format_id, $amount){

        $productFormat = ProductFormat::where("id", $product_format_id)->first();
        $productFormat->stock = $productFormat->stock - $amount;
        $productFormat->update();

    }

    function updateCartsAmount($product_format_id){
        
        $productFormat = ProductFormat::where("id", $product_format_id)->first();
        
        foreach(Cart::where("product_format_id", $product_format_id)->get() as $cart){

            if($cart->amount > $productFormat->stock){

                $cartModel = Cart::where("id", $cart->id)->first();
                $cartModel->amount = $productFormat->stock;
                $cartModel->update();

            }

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
            $payment->address = $request->city." ".$request->address;
            $payment->shipping_price = 5000;
            $payment->total_products = $this->getTotalProducts($request);
            $payment->email = $request->email;
            $payment->save();

            $this->storeProducts($request, $payment);

            if(\Auth::check()){

                $this->couponPayment($request->usedCoupons, $payment);

            }

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

            $productPurchaseModel = new ProductPurchase;
            $productPurchaseModel->product_format_id = $product["product_format_id"];
            $productPurchaseModel->price = $product["product_format"]["price"];
            $productPurchaseModel->amount = $product["amount"];
            $productPurchaseModel->payment_id = $payment->id;
            $productPurchaseModel->save();

        }

    }

    function getTotalProducts($request){

        $total = 0;
        foreach($request->products as $product){

            $total = $total + ($product["product_format"]["price"] * $product["amount"]);

        }

        return $total;

    }

    function couponPayment($usedCoupons,$payment){

        foreach($usedCoupons as $coupon){

            $couponModel = Coupon::where("coupon_code", $coupon)->first();

            $couponUser = CouponUser::where("user_id", \Auth::user()->id)->where("coupon_id", $couponModel->id)->first();
            $couponUser->payment_id = $payment->id;
            $couponUser->update();

        }

    }

}
