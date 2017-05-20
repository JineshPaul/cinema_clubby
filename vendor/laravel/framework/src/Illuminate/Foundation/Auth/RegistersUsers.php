<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Http\Controllers\BusinessController;
use Exception;

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

        // Registering the users
       
          $data =array('first_name'=>Input::get('first_name'),
                       'last_name'=>Input::get('last_name'),
                        'email'=>Input::get('email'),
                        'password'=>Input::get('password'),
                        'password_confirmation'=>Input::get('password_confirmation'));

          // validate User data
                  $response =   Validator::make($data, [
                    'first_name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                ]);
         
        if($response->fails()){
          $error =  json_encode($response->errors());
                return BusinessController::response($status = '300' , $data=[] , $msg = 'Failed',$error =$error,$header=[]);
         
        }else{

            try{

                // Generate Unique Id 

                $unique_id = BusinessController::generate_unique_id($data['first_name'],$data['last_name']);
                
                // Insert User data

                 $user = User::create([
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'unique_id' => $unique_id,
                        'email' => $data['email'],
                        'password' => bcrypt($data['password']),

                 ]);

                return BusinessController::response($status = '200' , $data=$user, $msg = 'Success',$error =[],$header=[]);  

            }
            catch(Exception $e){

                 return BusinessController::response($status = '300' , $data=[], $msg = 'Failed',$error =$e->getMessage(),$header=[]);
            }
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
