<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    function fetchAll($animal){

        if($animal == "dog")
        {
            $categories = Category::where("dog_category", 1)->get();
        }else{
            $categories = Category::where("cat_category", 1)->get();
        }

        return $categories;

    }

}