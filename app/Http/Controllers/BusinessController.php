<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;

class BusinessController extends Controller
{
   
   // Json API response
    public static function response($status ='200', $data=[] , $msg ='Success',$error = [],$header=[]){

        return response()->json([
            
                'error' => $error,
                'message'=> $msg, 
                'status' => $status,
                'data'=> $data,
                'header' => $header
            ]);

        
    }
    
    // Create Unique Id for the users

    public static function generate_unique_id($first_name,$last_name){
       
        $continue = true;
      
        while($continue){

            $rand_num = rand(1001,9999);

            $string = $first_name . "_" . $last_name . "_" .$rand_num;

            $count = User::where('unique_id', $string)->count();
             
             if($count < 1){

                 $continue = false; 
              
             }

             return $string;

       } 
}

    // public function access_token(){
       

    //     $username='paul@gmail.com';
    //     $password='123456';
    //     $grant_type = 'password';
    //     $client_id = env('CLIENT_ID');
    //     $client_secret = env('CLIENT_SECRET');

    //     $base_url = env('BASE_URL');

    //     $url = $base_url . "/oauth/token" 

    //     $http = new Client();
        
    //     $response = $http->post($url, [
    //         'form_params' => [
    //             'grant_type'=> $grant_type,
    //             'client_id'=> $client_id,
    //             'client_secret'=> $client_secret,
    //             'username'=>$username,
    //             'password'=>$password,
    //             'scope' => '',
    //         ],
    //     ]);

    //     return json_decode((string) $response->getBody(), true); 
          
    // }
}
