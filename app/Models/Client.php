<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mindscms\Entrust\Traits\EntrustUserWithPermissionsTrait;

class Client extends  Authenticatable
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    use SoftDeletes;



    protected $guarded=[];

    protected $cast =[
        'is_active' => 'boolean',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'started_payment_date' => 'datetime',
        'ended_payment_date' => 'datetime',
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


    public function stores()
    {
        return $this -> belongsToMany(Store::class,'client_stores');
    }


    public function importlist(){
        return $this-> belongsTo(ImportList::class);
    }



    public function complaints(){
        return $this->hasMany(Complaint::class);
    }



    // public function subscription(){
    //     return $this->belongsTo(Subscription::class);
    // }

    public function subscriptions(){
        return $this->belongsToMany(Plan::class,'subscriptions');
    }








    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }


    public function hasAbility($permissions_client)
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }

        foreach ($role->permissions_client as $permission) {
            if (is_array($permissions_client) && in_array($permission, $permissions_client)) {
                return true;
            } else if (is_string($permissions_client) && strcmp($permissions_client, $permission) == 0) {
                return true;
            }
        }
        return false;
    }



}
