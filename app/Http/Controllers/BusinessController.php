<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BusinessController extends Controller
{
   

    public static function response($status ='200', $data=[] , $msg ='Success',$error = [],$header=[]){

        return response()->json([
            
                'error' => $error,
                'message'=> $msg, 
                'status' => $status,
                'data'=> $data,
                'header' => $header
            ]);

        
    }

    public function access_token(){
       

        $username='paul@gmail.com';
        $password='123456';
        $grant_type = 'password';
        $client_id = env('CLIENT_ID');
        $client_secret = env('CLIENT_SECRET');

        $base_url = env('BASE_URL');

        $url = $base_url . "/oauth/token" 

        $http = new Client();
        
        $response = $http->post($url, [
            'form_params' => [
                'grant_type'=> $grant_type,
                'client_id'=> $client_id,
                'client_secret'=> $client_secret,
                'username'=>$username,
                'password'=>$password,
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);

        // $res = Request::create('http://192.168.56.1/oauth/token', 'POST', ['username' => $username, 'password' => 
        //     $password,'grant_type' => $grant_type , 'clienT_id' => $client_id , 'client_secret' => $client_secret,'scope' => '']);

        //  print_r($res->getStatusCode());
        //  exit;
 
          
    }
}
