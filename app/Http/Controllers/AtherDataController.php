<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\Professions;

class AtherDataController extends Controller
{

    public function getProfessions(){

		return Professions::all();
    }

    public function getPContriesCities(){

		return City::all();
    }
}
