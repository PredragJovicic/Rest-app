<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agencies;
use App\User;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{


	public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
		return Agencies::all();
    }
 
    public function show(Agencies $agency)
    {

        $users = User::where('agency','=',$agency->name)->get();
        $res = array("agency"=>json_decode($agency,true), 'users'=>$users);

        return response()->json($res, 200);
    }
    public function getAgencyContacts(Agencies $agency)
    {

        $users = User::where('agency','=',$agency->name)->get();
        var_dump($users->all());

        return $agency;
    }

    public function store(Request $request)
    {
        $agency = Agencies::create($request->all());
		return response()->json($agency, 201);
    }

    public function update(Request $request, Agencies $agency)
    {
        $agency->update($request->all());

        return response()->json($agency, 200);
    }

    public function delete(Agencies $agency)
    {
        $agency->delete();

        return response()->json([ 'data' => 'Agency deleted.' ], 204);
    }
}
