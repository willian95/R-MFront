<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    
    function fetch(){

        return response()->json(Brand::inRandomOrder()->take(4)->get());

    }

}
