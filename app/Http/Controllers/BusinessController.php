<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BusinessController extends Controller
{
   

    public static function response($status = false, $data=[] , $msg =false,$error = [],$header=[]){

        return response()->json([
            
                'error' => $error,
                'message'=> $msg, 
                'status' => $status,
                'data'=> $data,
                'header' => $header
            ]);

        
    }

    public function access_token(){

          
		        // $params =array(
		        //     'grant_type' => 'password',
		        //     'client_id' => env('CLIENT_ID'),
		        //     'client_secret' => env('CLIENT_SECRET'),
		        //     'username' =>$username,
		        //     'password' => $password
          //           );
		
       

          $username='paul@gmail.com';
          $password='123456';


  $client = new Client();
    $res = $client->request('POST', 'http://localhost:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
                    'client_id' => env('CLIENT_ID'),
                    'client_secret' => env('CLIENT_SECRET'),
                    'username' =>$username,
                    'password' => $password,
        ]
    ]);

    $result= $res->getBody();
    
 
          echo '<pre>'; print_r($result); exit;
    }
}
