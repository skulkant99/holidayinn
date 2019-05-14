<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $chk = \App\Models\User::orWhere('email', $request->email)->first();
        if($chk){
            $return['status'] = 0;
            $return['content'] = 'Email is already in use Please check again';
            $return['title'] = 'Register for membership wrong';
            return $return;
        }
        $input_all['password'] = bcrypt($request->input('password'));
        $input_all['firstname'] = $request->input('firstname');
        $input_all['lastname'] = $request->input('lastname');
        $input_all['email'] = $request->input('email');


        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
            'password' => 'required|min:6'
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                $id = \App\Models\User::insertGetId($data_insert);
                $email = $input_all['email'];
                $token = base64_encode($email.'#'.\Hash::make(20));
                $input_all['token'] = $token;
                \App\Models\PasswordReset::insert(['email'=>$email,'token'=>$token]);
                \Mail::send('emails.activate_email', $input_all, function ($m) use($token , $input_all){
                    $m->to($input_all['email'], $input_all['firstname'])->subject('Confirm Register holidayinn');
                });
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Finish';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Fail'.$e->getMessage();
            }
        }else{
            $failedRules = $validator->failed();
            if(isset($failedRules['email']['Unique'])) {
                $return['status'] = 2;
                $return['content'] = 'Email duplicate';
            } else {
                $return['status'] = 0;
            }
        }
        $return['title'] = 'Create data';
        return json_encode($return);
    }
    public function ActivateEmail($token){
        if($token){
            $org_token = $token;
            $token = base64_decode($token);
            // echo $token;
            $spl = explode("#",$token);
            if(sizeof($spl)==2){
                $email = $spl[0];
                // $token = $spl[1];
                $result = \App\Models\PasswordReset::where([
                    'email'=>$email,
                    'token'=>$org_token
                ])->first();
                if($result){
                    \App\User::where('email',$email)->update(['active_email'=>'T']);
                    \App\Models\PasswordReset::where([
                        'email'=>$email,
                        'token'=>$org_token
                    ])->delete();
                    return '<div style="text-align:center">ทำการยืนยันอีเมล์เรียบร้อย <a href="'.url('/').'">Login</a></div>';
                }else{
                    return 3;
                }
            }else{
                return 2;
            }

        }else{
            return 1;
        }

    }
    public function subscrice(Request $request){
        $chk = \App\Models\EmailSubscribe::orWhere('email', $request->email)->first();
        if($chk){
            $return['status'] = 0;
            $return['content'] = 'Email is already in use Please check again';
            $return['title'] = 'Sunscribe for membership wrong';
            return $return;
        }
        // $input_all['password'] = bcrypt($request->input('password'));
        $input_all['firstname'] = $request->input('firstname');
        $input_all['lastname'] = $request->input('lastname');
        $input_all['email'] = $request->input('email');


        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
            'email' => 'unique:email_subscribes',
            // 'password' => 'required|min:6'
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                $id = \App\Models\EmailSubscribe::insertGetId($data_insert);
                $email = $input_all['email'];
                $token = base64_encode($email.'#'.\Hash::make(20));
                $input_all['token'] = $token;
                // \App\Models\PasswordReset::insert(['email'=>$email,'token'=>$token]);
                \Mail::send('emails.subscrice_email', $input_all, function ($m) use($token , $input_all){
                    $m->to($input_all['email'])->subject('Confirm Subscribe holidayinn');
                });
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Finish';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Fail'.$e->getMessage();
            }
        }else{
            $failedRules = $validator->failed();
            if(isset($failedRules['email']['Unique'])) {
                $return['status'] = 2;
                $return['content'] = 'Email duplicate';
            } else {
                $return['status'] = 0;
            }
        }
        $return['title'] = 'Create data';
        return json_encode($return);
    }
}