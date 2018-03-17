<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest'); //['except' => 'logout']
    }

    public function index()
    {
        return response()->json(['data' => 'No perrmition to access here!'], 200);
    }

    public function login(Request $request)
    {

        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->generateToken();

            return response()->json([
                'data' => $user->toArray(),
            ]);
        }

        return response()->json(['data' => 'Check your email and password!'], 200);
    }

    public function logout(Request $request)
    {

        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
			return response()->json([ 'data' => 'User logged out.' ], 200);
        }

        return response()->json([ 'data' => 'Error logged.' ], 200);
    }

    
}
