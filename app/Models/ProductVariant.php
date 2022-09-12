<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = "product_variants";
    protected $guarded = [];


    public function products(){
        return $this->belongsTo(Product::class);
    }


    public function getVriantsAttribute($vriants)
    {
        return json_decode($vriants, true);
    }



}
