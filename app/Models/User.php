<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = ['nome','email','password'];

    public function likes(){
        return $this->hasOne("likes");
    }

}

?>
