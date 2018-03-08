<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserConteroller extends Controller
{


    public function __construct()
    {
        $this->middleware('admin', ['except' =>  ['getActivate', 'show', 'update']]);
    }

    public function index()
    {
        return User::all();
    }

    public function show(Request $request, User $user)
    {
        if($request->input('api_token') == $user->api_token) {
            return $user;
        }else{
            return response()->json(['data' => 'You dont have permmition to.access this!'], 200);
        }

    }

    public function showAdmistrator(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        if($request->input('api_token') == $user->api_token) {

            $req = $request;
            $reqall = $req->all();
            if ($req->hasFile('avatar')) {
                if (file_exists('avatar/' . $user->avatar)) {
                    unlink('avatar/' . $user->avatar); // Delete the picture if it already exists
                }
                $ext = '.' . $req->file('avatar')->extension();
                $newfilename = time() . '_avatar' . $ext;
                $req->file('avatar')->move('avatar', $newfilename);
                $reqall['avatar'] = $newfilename;

            }
            if (isset($reqall['password'])) {

                $reqall['password'] = bcrypt($req->input('password'));
            }


            $user->update($reqall);

            return response()->json($user, 200);
        }else{
            return response()->json(['data' => 'You dont have permmition to.access this!'], 200);
        }
    }
    public function updateAdminstrator(Request $request, User $user)
    {
        $req = $request;
        $reqall = $req->all();
        if ($req->hasFile('avatar'))
        {
            if(file_exists('avatar/'.$user->avatar)) {
                unlink('avatar/' . $user->avatar); // Delete the picture if it already exists
            }
            $ext = '.' . $req->file('avatar')->extension();
            $newfilename = time().'_avatar' . $ext;
            $req->file('avatar')->move('avatar',$newfilename);
            $reqall['avatar'] = $newfilename;

        }
        if(isset($reqall['password'])){

            $reqall['password'] = bcrypt($req->input('password'));
        }


        $user->update($reqall);

        return response()->json($user, 200);
    }


    public function delete(User $user)
    {

        $user = User::find($user->contact_id);
        $user->delete();
        if(file_exists('avatar/'.$user->avatar)){
            unlink('avatar/'.$user->avatar);
        }
        $user->delete();

        return response()->json(['data' => 'Contact deleted'], 204);
    }

}
