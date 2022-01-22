<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    use HasFactory;
    protected $table = "product_purchases";

    public function productFormat(){
        return $this->belongsTo(ProductFormat::class);
    }

}
