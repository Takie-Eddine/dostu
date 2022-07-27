<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCompany extends Model
{
    use HasFactory;

    protected $table = 'supplier_companies' ;

    protected $guarded = [];
    protected $cast =[

        'is_active' => 'boolean',
    ];



    public function getActive(){
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
    }


    public function scopeActive($query){
        return $query -> where('is_active',1);
    }


    public function suppliers(){
        return $this->hasMany(Supplier::class,'company_id');
    }
}
