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

        $cities = DB::table('city')->get();
		
        return response()->json($cities);
    }
}
