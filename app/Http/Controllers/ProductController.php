<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    function fetch(Request $request){
        
        $products = Product::whereHas('category', function($q) use($request){

            if($request->animal == "dog"){
                $q->where("dog_category", 1);
            }else{
                $q->where("cat_category", 1);
            }

            if($request->categories != null){
                if(count($request->categories) > 0){
                    $q->whereIn("id", $request->categories);
                }
            }
            
        })->with(['productFormats' => function ($query) {
            $query->orderBy("price", "asc");
        }])->paginate(20);
        

        return response()->json($products);

    }

}
