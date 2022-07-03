<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Like;
use App\Models\House;


class CreateController extends Controller
{
    public function create(){

        $request = request();


        $nome = $request->nome;
        $prezzo = $request->prezzo;
        $citta = $request->citta;
        $indirizzo = $request->indirizzo;
        $descrizione = $request->descrizione;
        $img = $request->img;
    
        $img2 = "img/".$img;
    
    
        if(isset($nome) && isset($prezzo) && isset($descrizione) && isset($img) && isset($citta) && isset($indirizzo))
        {

            $values = array('nome'=>$nome,'prezzo'=>$prezzo,'descrizione'=>$descrizione,'citta'=>$citta,'indirizzo'=>$indirizzo,'img'=>'img/'.$img, 'tipo'=>'new');
            $dati = House::insert($values);
    
            if($dati){
    
                echo '<script type="text/javascript">
                    alert("Annuncio creato!")
                    </script>';
                return redirect('/index');
            }
            else $errore = true;
    
        }
    }

}

?>