<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;



    protected $with = ['translations'];


    protected $fillable = [
        'brand_id',
        'slug',
        'sku',
        'price',
        'selling_price',
        'qty',
        'in_stock',
        'is_active'
    ];

    protected $casts = [

        'in_stock' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $translatedAttributes = ['name', 'description', 'title'];


    public function getActive()
    {
        return $this->is_active == 0 ? 'unactive' : 'active';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'product_id');
    }

    //////
    ///

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function hasStock($quantity)
    {
        return $this->qty >= $quantity;
    }

    public function outOfStock()
    {
        return $this->qty === 0;
    }

    public function inStock()
    {
        return $this->qty >= 1;
    }


}
