<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtherDataController extends Controller
{

    public function getProfessions(){

        $professions = DB::table('professions')->get();

        return response()->json($professions);
    }

    public function getPContriesCities(){

        $countries = DB::table('country')->get();
        $res = array();
        foreach ($countries as $country){

            $cities = DB::table('city')->where('country','=', $country->country )->get();
            $rescity = array();
            foreach ($cities as $city) {
                $rescity[] = $city;
            }
            //$res[$country->country] = $rescity;
            array_push($res,array($country->country => $rescity ));

        }

        return response()->json($res);
    }
}
