<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mindscms\Entrust\Traits\EntrustUserWithPermissionsTrait;

class Client extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    protected $guarded=[];

    protected $cast =[
        'is_active' => 'boolean',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function getActive()
    {
        return $this->is_active == 0 ? 'unactive' : 'active';
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }


    public function  getPhotoAttribute($val){
        return ($val !== null) ? asset('assets/images/clients/' . $val) : "";
    }
}
