<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Http\Controllers\BusinessController;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {     
	   //echo '<pre>'; print_r(); exit;
	   
	      $data =array('name'=>Input::get('name'),
		                'email'=>Input::get('email'),
						'password'=>Input::get('password'),
						'password_confirmation'=>Input::get('password_confirmation'));


	      $response =   Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
		 
        if($response->fails()){
          $error =  json_encode($response->errors());
         return BusinessController::response($status = '300' , $data=[] , $msg = 'Failed',$error =$error,$header=[]);
		 
		}else{

		   $data = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

           return BusinessController::response($status = '200' , $data=$data, $msg = 'Success',$error =[],$header=[]); 	
		}
      

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
