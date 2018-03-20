<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('RegisterContact');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
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
	 
    protected function create(array $data)
    {
   
		$data['avatar'] = $this->base64_to_img($data['avatar']);

        return User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
				'admin' => 0,
				'agency' => $data['agency'],
				'professions' => $data['professions'],
				'phone' => $data['phone'],
				'avatar' => $data['avatar'],
			]);

    }
	
	protected function registered(Request $request, $user)
	{
		$user->generateToken();

		return response()->json(['data' => $user->toArray()], 201);
	}
}
