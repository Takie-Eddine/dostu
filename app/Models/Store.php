<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;


    protected $guarded = [];
<<<<<<< HEAD
=======




    public function clients()
    {
        return $this -> belongsToMany(Client::class,'client_stores');
    }
>>>>>>> 7ebfd7cad9397cf9546e26da6b8ec6aa19807d66
}
