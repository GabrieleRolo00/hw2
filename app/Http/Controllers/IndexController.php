<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\Like;
use App\Models\House;
use App\Models\User;


class IndexController extends BaseController
{
    public function carica($tipo){


        if(Session::exists('user'))
            $userid = Session::get('user');
        else
            $userid = "";


        $case = array();

        $house = House::where('tipo', $tipo)->get();

        if($userid !== ""){

            $case = array();
            
            $i=0;

            foreach($house as $casa)
            {
                $case[$i] = $casa;

                $likes = Like::where('id_utente', $userid)->where('id_casa',$casa->id_casa)->get();

                if(count($likes)!=0){
                    $case[$i]->like = true;
                }else{
                    $case[$i]->like = false;
                }
                $i++;
            }

        }else{
                
                foreach($house as $casa){
                    $case[] = $casa;
                }
                       
            }

            return $case;
    }


}

?>