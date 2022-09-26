<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $with = ['translations'];
    protected $fillable = [
        'product_id',
        'store_id',
        'slug',
        'default_price'
    ];
    protected $casts = [

        'in_stock' => 'boolean',
        'is_active' => 'boolean',

    ];

    protected $translatedAttributes = ['name', 'description'];

    public function getStock()
    {
        return $this->in_stock == 0 ? 'out of stock' : 'in stock';
    }



    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function variants(){
        return $this->hasMany(ProductVariantClient::class);
    }

    public function images()
    {
        return $this->hasMany(MediaStore::class);
    }
}
