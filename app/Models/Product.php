<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productFormats(){
        return $this->hasMany(ProductFormat::class);
    }
    public function productSecondaryImages(){
        return $this->hasMany(ProductSecondaryImage::class);
    }

}
