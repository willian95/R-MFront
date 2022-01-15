<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table= "sizes";

    public function productFormats(){
        return $this->hasMany(ProductFormat::class);
    }

}
