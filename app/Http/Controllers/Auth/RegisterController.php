<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\UserController;
use Exception;
use Illuminate\Support\Facades\Input;
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
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    // Ignore This 
    protected function validator(array $data)
    {  
          return  Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    // Ignore This 
    protected function create(array $data)
    { 
        $data = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
       
        
    }



      public function register(Request $request)
    {     
       
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
                                'email_token' => md5(uniqid()),
                                'password' => bcrypt($data['password']),

                         ]);

                          // if($user){

                          //       UserController::registration_confirm_mail($user);
                          // }

                        return BusinessController::response($status = '200' , $data=$user, $msg = 'Success',$error =[],$header=[]);  

                    }
                    catch(Exception $e){

                         return BusinessController::response($status = '300' , $data=[], $msg = 'Failed',$error =$e->getMessage(),$header=[]);
                    }
        }
    
    }
}
