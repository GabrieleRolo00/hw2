<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Like;
use App\Models\House;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Cookie;


class LikeController extends Controller
{
    public function addLike($id){

        if((!Session::get('user'))) 
        {
            return view("login");
        }
    
        
        $userid = Session::get('user');
    
        // Insert like
        $values = array('id_utente'=>$userid,'id_casa'=>$id);
        $res = Like::insert($values);
    
        if (!$res) {
    
           echo "Error";
           exit;
        }

        return;
    }

    public function removeLike($id){

        if((!Session::get('user'))) 
        {
            return view("login");
        }
    
        
        $userid = Session::get('user');
    
        // delete like

        $res = Like::where('id_utente',$userid)->where('id_casa',$id)->delete();
    
        if (!$res) {
    
           echo "Error";
        }

        return;
    }

}

?>