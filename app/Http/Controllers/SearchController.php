<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\Like;
use App\Models\House;


class SearchController extends BaseController
{
    public function search(){

        $request = request();

        $citta = $request->citta;

        $case = House::where('citta',$citta)->get();
        $totCase = House::where('citta',$citta)->count();

        if($totCase == 0){
            return view('index')->with('noRis',true);

        }else {
                return view('search')->with('case', $case)->with('totCase', $totCase)->with('noRis',false);
        }

    }

    public function search2($citta)
    {
        $case = House::where('citta',$citta)->get(); 
        return $case;
    }
}

?>