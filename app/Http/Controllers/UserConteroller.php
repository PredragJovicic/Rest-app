<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
        if($request->input('api_token') == $user->api_token || Auth::guard('api')->user()->admin == 1) {
            return $user;
        }else{
            return response()->json(['data' => 'You dont have permmition to.access this!'], 401);
        }

    }

    public function update(Request $request, User $user)
    {
		
        if($request->input('api_token') == $user->api_token || Auth::guard('api')->user()->admin == 1) {

			$reqall = $this->userUpdate($request, $user);
            $user->update($reqall);

            return response()->json($user, 200);
        }else{
            return response()->json(['data' => 'You dont have permmition to.access this!'], 401);
        }
    }

    public function delete(User $user)
    {

        if(file_exists('avatar/'.$user->avatar)){
            unlink('avatar/'.$user->avatar);
        }
        $user->delete();

        return response()->json(['data' => 'Contact deleted'], 204);
    }

	private function userUpdate(Request $request, User $user){
		 
		$req = $request;
        $reqall = $req->all();
        if (!empty($reqall['avatar']))
        {
            if(file_exists('avatar/'.$user->avatar)) {
                unlink('avatar/' . $user->avatar); 
            }
			
			$reqall['avatar'] = $this->base64_to_img($reqall['avatar']);

        }
        if(isset($reqall['password'])){

            $reqall['password'] = bcrypt($req->input('password'));
        }

		return $reqall;
	}
	
	private function base64_to_img($img) {

		$img = explode(",",$img);
		$ext = explode("/", $img[0]);
		$ext = explode(";", $ext[1]);
		$ext = $ext[0];
		$content = str_replace(' ', '+', $img[1]);
		$encdata = base64_decode($content);
		$filename = time() .'_avatar' . '.'.$ext;
		file_put_contents('avatar/'.$filename, $encdata);
		
		return $filename; 
	} 
}
