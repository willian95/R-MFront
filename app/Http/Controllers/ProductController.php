<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductFormat;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function fetch(Request $request)
    {
        $query = Product::whereHas('category', function ($q) use ($request) {
            if ($request->animal == 'dog') {
                $q->where('dog_category', 1);
            } else {
                $q->where('cat_category', 1);
            }

            if ($request->categories != null) {
                if (count($request->categories) > 0) {
                    $q->whereIn('id', $request->categories);
                }
            }
        })
        ->whereHas('brand', function ($q) use ($request) {
            if ($request->brands == 'all') {
                $q->where('id', '>', 0);
            } else {
                $q->where('id', $request->brands);
            }
        })
        ->with(['productFormats' => function ($query) {
            $query->orderBy('price', 'asc');
        }]);

        if (isset($request->search)) {
            $query = $query->where('name', 'like', '%'.$request->search.'%');
        }

        $products = $query->paginate(20);

        return response()->json($products);
    }

    public function productFormats($id)
    {
        $producFormats = ProductFormat::where('product_id', $id)->with('size', 'color')->get();

        return response()->json($producFormats);
    }
}
