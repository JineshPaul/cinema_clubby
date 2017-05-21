<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use Auth;


class UserController extends Controller
{

	// Regitration verification email
    public static function registration_confirm_mail($user){    

       $mail =  Mail::send('auth.emails.email_reg', ['user' => $user, 'confirmation_code' => $user->email_token], function ($m) use ($user) {
            $m->from('jineshpaul89@gmail.com', 'CinemaClubby');
            $m->to($user->email, $user->first_name)->subject('Thank you for Registering');
        });

    }



    // Email verification Confirmation
    public function email_confirm(Request $request, $code) {
        $user = User::where('email_token', '=', $code)->first();
        if ($user) {
            $user->email_verification = 1;
            $user->email_token = '';
            $user->save();
            Auth::login($user);
            return redirect('/verified_email/success');
        } else {
            return redirect('/verified_email/failure');
        }
    }


    // Verifired or incomplete email
    public function verified_email($status) {
        
        return view('verified_email', [
            'status' => $status
        ]);
       
    }


}
