<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function index(){
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
        }
        $return['title'] = 'เพิ่มข้อมูล';
        return json_encode($return);
    }
}