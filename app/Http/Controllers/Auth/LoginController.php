<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BusinessController;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }


    public function authenticate(Request $request)
    {
        $email = $request->input('username');
        $password = $request->input('password');

        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $user = Auth::user();
            
            return BusinessController::response($status = '200' , $data= $user, $msg = 'Success', $error =[] ,$header=[]);
            
        }else{
            return BusinessController::response($status = '300' , $data= [], $msg = 'Failed', $error ="Invalid Credintials" ,$header=[]);
        }
    }
}
