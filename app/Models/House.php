<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['nome','prezzo','descrizione','citta','indirizzo','img'];

    public function likes(){
        return $this->hasOne("likes");
    }
    

}

?>
