<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantClient extends Model
{
    use HasFactory;
    protected $table = "product_variants_client";
    protected $guarded = [];




    public function prod(){
        return $this->belongsTo(Product::class);
    }


    public function getVriantsAttribute($vriants)
    {
        return json_decode($vriants, true);
    }


    public function storeProduct(){
        return $this->belongsTo(StoreProduct::class);
    }
}
