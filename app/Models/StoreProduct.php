<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    use HasFactory;
    use Translatable;





    protected $with = ['translations'];

    protected $fillable = [
        'product_id',
        'store_id',
        'slug',
        'in_stock',
        'is_active',

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

    public function getStock()
    {
        return $this->in_stock == 0 ? 'out of stock' : 'in stock';
    }


    public function images()
    {
        return $this->hasMany(MediaStore::class);
    }

    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
