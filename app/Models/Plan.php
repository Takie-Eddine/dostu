<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    use Translatable;
    use HasFactory;


    protected $guarded = [];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name','description'];

    protected $hidden = ['translations'];

    public function scopeTypeA($query)
    {
        return $query->where('type',1);
    }
    public function scopeTypeM($query)
    {
        return $query->where('type',0);
    }


    // public function subscriptions(){
    //     return $this->belongsTo(Subscription::class);
    // }


    public function subscriptions(){
        return $this->belongsToMany(Client::class,'subscriptions');
    }




}
