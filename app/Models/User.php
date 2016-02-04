<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'users';

    public function photos(){

        return $this->hasMany('APP\Models\Data','user_name','descrption');
    }


}
