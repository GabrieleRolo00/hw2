<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Like;
use App\Models\House;


class PostController extends Controller
{
    public function post($id){

        $casa = House::where('id_casa',$id)->first();


        if(Session::get('user')!=null) {

            $utenteid = Session::get('user');
                                        
            $datiLike = Like::where('id_utente',$utenteid)->where('id_casa',$id)->get();

            if(count($datiLike)==1){
                $like = true;
            }else{
                $like = false;
            }
        }else{
            $like = null;
        }



        return view('post')->with('casa',$casa)->with('like',$like);
    }
}

?>