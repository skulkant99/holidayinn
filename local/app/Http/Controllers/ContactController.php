<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function index(){
        $data['social'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','H')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
        $data['logo'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','F')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
        $data['kids'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','K')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
        $data['HelpTypes'] = \App\Models\HelpType::get();
        return view('contact',$data);
    }
    public function store(Request $request)
    {
        $input_all['first_name'] = $request->input('first_name');
        $input_all['last_name'] = $request->input('last_name');
        $input_all['email'] = $request->input('email');
        // $input_all['comment_by'] = Auth::user()->name;
        $input_all['help_id'] = $request->input('help_id');
        $input_all['detail'] = $request->input('detail');
        // $input_all['status']  = 1;
        
        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\ContactHelp::insert($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'สำเร็จ';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
            }
        }else{
            $return['status'] = 0;
            $return['content'] = 'Invalid email format';
        }
        $return['title'] = 'Warning';
        return json_encode($return);
    }
}