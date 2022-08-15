<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportList extends Model
{
    use HasFactory;


    protected $guarded = [];




    public function clients(){
        return $this->belongsToMany(Client::class,'import_lists');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'import_lists');
    }

}
