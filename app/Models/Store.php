<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = [];



    //public function

    public function getDefault()
    {
        return $this->default == 0 ? 'not default' : 'default';
    }


    public function getStatus()
    {
        if($this->status == 0){
            return 'unactive';
        }
        if($this->status == 1){
            return 'active';
        }
        else{
            return 'blocked';
        }

       // return $this->approved == 0 ? 'pending' : 'approved';
    }

    public function clients()
    {
        return $this -> belongsToMany(Client::class,'client_stores');
    }


    public function complaints(){
        return $this->hasMany(Complaint::class);
    }


}
