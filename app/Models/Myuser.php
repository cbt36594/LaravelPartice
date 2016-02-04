<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Myuser extends Model
{
    //
    protected $table = 'myusers';

    public function datas(){

        return $this->hasMany('App\Models\Data','user_name','users_name');
    }


}
