<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Like;
use App\Models\House;


class PreferitiController extends Controller
{
    public function caricaPref(){
                        

        $utenteid = Session::get('user');
        $case = array();
                            
        $datiLike = Like::where('id_utente', $utenteid )->get();

        if($datiLike){
            foreach($datiLike as $like){

                $case[] =  House::where('id_casa', $like->id_casa)->first();
                
            }
        }

      // Ritorna
      return $case;

    }
}

?>