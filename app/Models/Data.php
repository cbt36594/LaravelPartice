<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    //
    protected $table = 'datas';
     public function myusers(){

        return $this->belongsTo('App\Models\Myuser','user_name','users_name');
    }
}
