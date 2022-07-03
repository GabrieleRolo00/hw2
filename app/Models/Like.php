<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    public function users(){
        return $this->hasOne("users");
    }

    public function houses(){
        return $this->hasOne("houses");
    }

}

?>
