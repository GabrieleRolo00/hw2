<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Like;
use App\Models\House;
use Illuminate\Support\Facades\Session;


class MappaController extends Controller
{
    public function mappa($full_address){

        if($full_address !=null){																														
            $url = 'http://www.mapquestapi.com/geocoding/v1/address?thumbMaps=false&outFormat=json&key='.env('mappa_apikey');
            $curl = curl_init();//avvio curl
            curl_setopt($curl,CURLOPT_URL,$url.'&location=Washington,DC'.urlencode($full_address));					//imposta l'url
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);;														//ci fa tornare una stringa
            $response = curl_exec($curl);																		//lo esegue
            curl_close($curl);//chiude curl
            $coordinates = json_decode($response,true);		//trasformo il json in un array associativo(true)


            return $coordinates['results'][0]['locations'][0]['latLng'];								//ricreo un json ma solo con latitudine e longitudine
        }
    }

}

?>