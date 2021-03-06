<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    function fetchAll($animal)
    {

        if ($animal == "dog") {
            $categories = Category::where("dog_category", 1)->where("cat_category", 0)->orderBy("name", "asc")->get();
        } else {
            $categories = Category::where("cat_category", 1)->where("dog_category", 0)->orderBy("name", "asc")->get();
        }
        $common = Category::where("cat_category", 1)->where("dog_category", 1)->orderBy("name", "asc")->get();

        $data = [
            "categories" => $categories,
            "common" => $common
        ];

        // dd($data);

        return $data;
    }
}
