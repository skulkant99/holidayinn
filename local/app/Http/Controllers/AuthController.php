<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Hash;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function CheckLogin(Request $request){
    	$email = $request->input('email');
        $password = $request->input('password');
    	if (\Auth::guard('user')->attempt(['email' => $email, 'password' => $password ,'active_email' => 'T'])) {
            $user_id = \Auth::guard('user')->id();
            // insert log login
                // $data_log_insert = [
                //     'ip' => $request->ip(),
                //     'user_id' => $user_id,
                //     'created_at' => date('Y-m-d H:i:s'),
                //     'updated_at' => date('Y-m-d H:i:s'),
                // ];
                // \App\Models\LogLogin::insert($data_log_insert);
            // end insert log login
            return 1;
        }else{
        	return 0;
        }

    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}