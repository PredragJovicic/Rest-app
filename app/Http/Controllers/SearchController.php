<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function searchAgencies(Request $request){

        $search = $request->input('search');
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        if(!empty($search)) {

            $res = DB::table('agencies')
                ->where("name", "like", '%' . $search . '%')
                ->orWhere('phone', "like", '%' . $search . '%')
                ->orWhere('email', "like", '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->take($limit)
                ->skip($offset)
                ->get();
            return response()->json($res);
        }else{

            $res = DB::table('agencies')
                ->orderBy('id', 'desc')
                ->take($limit)
                ->skip($offset)
                ->get();
            return response()->json($res);
        }
    }
    public function searchContacts(Request $request ){

        $search = $request->input('search');
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        if(!empty($search)) {

            $res = DB::table('users')
                ->where("admin","=",'0')
                ->where("firstlastname","like",'%'.$search.'%')
                ->orWhere('phone', "like",'%'.$search.'%')
                ->orWhere('email', "like",'%'.$search.'%')
                ->orderBy('id', 'desc')
                ->take($limit)
                ->skip($offset)
                ->get();
            return response()->json($res);
        }else{
            $res = DB::table('users')
                ->where("admin","=",'0')
                ->orderBy('id', 'desc')
                ->take($limit)
                ->skip($offset)
                ->get();
            return response()->json($res);
        }
    }
}
