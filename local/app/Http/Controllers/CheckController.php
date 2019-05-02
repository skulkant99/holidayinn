<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class CheckController extends Controller
{
    public function FormRespassword(Request $request){
        $chk = \App\Models\User::orWhere('email', $request->email)->first();
        if($chk == null){
            $return['status'] = 0;
            $return['content'] = 'E-mail ไม่ถูกต้อง';
            $return['title'] = 'ลืมรหัสผ่าน';
            return $return;
        } else {
            $input_all['email'] = $request->input('email');
            $input_all['name'] = $chk->name;

            $validator = Validator::make($request->all(), [
                'email' => 'email',
            ]);

            if (!$validator->fails()) {
            \DB::beginTransaction();
                try {
                    $data_insert = $input_all;
                    $email = $input_all['email'];
                    $token = base64_encode($email.'#'.\Hash::make(20));
                    $input_all['token'] = $token;
                    \App\Models\PasswordReset::insert(['email'=>$email,'token'=>$token]);
                    \Mail::send('emails.resetpassword_email', $input_all, function ($m) use($token , $input_all){
                        $m->to($input_all['email'], $input_all['name'])->subject('Reset Password holidayinn');
                    });
                    \DB::commit();
                        $return['status'] = 1;
                        $return['content'] = 'ได้ทำการส่ง Password ใหม่ทางอีเมลแล้ว';
                        $return['title'] = 'ลืมรหัสผ่าน';
                } catch (\Exception $e) {
                    \DB::rollBack();
                        $return['status'] = 0;
                        $return['content'] = 'ไม่สำรเ็จ กรุณาตรวจสอบอีกครั้ง'.$e->getMessage();;
                }
            }else{
                $return['status'] = 0;
            }
        }
        return $return;
    }
    public function Repassword($token){

        $email = \App\Models\PasswordReset::where('token',$token)->first();
        if(!$email){
            throw new \Exception('ไมพบข้อมูลการร้องขอเปลี่ยนรหัสผ่าน');
        }else {
            if(date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($email->created_at.' +1 hour'))){
                $id = \App\Models\User::orWhere('email', $email->email)->first();
                $data['id'] = $id->id;
                return view('cf-password',$data);
            }else {
                throw new \Exception('ลิ้งก์หมดเวลา');
            }
            \App\Models\PasswordReset::where('token',$token)->delete();
        }
    }
    public function updatepassword(Request $request){
        dd($request->input('password'));
        $input_all['password'] = bcrypt($request->input('password'));
        $id = $request->input('user_id');

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
            
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\User::where('id',$id)->update($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'สำเร็จ';
            } catch (\Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();;
            }
        }else{
            $return['status'] = 0;
        }
        $return['title'] = 'เพิ่มข้อมูล';
        return json_encode($return);
}
}