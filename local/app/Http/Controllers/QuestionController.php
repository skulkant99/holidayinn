<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class QuestionController extends Controller
{
    public function index()
    {
        $data['ask'] = \App\Models\Answer::leftJoin('questions','questions.id','=','answers.question_id')
            ->select('answers.*','questions.question as question_name')
            ->get();
        return view('faq',$data);
    }
    public function seach(Request $request)
    {
        $name_seach = $request->has('name') ? $request->input('name') : null;
        if($name_seach != null){
            $data['ask']= \App\Models\Answer::leftJoin('questions','questions.id','=','answers.question_id')
                ->select('answers.*','questions.question as question_name')
                ->where('Answers.answer','like','%'.$name_seach.'%')
                ->orWhere('questions.question','like','%'.$name_seach.'%')
                ->get();
        }else{
            $data['ask'] = \App\Models\Answer::leftJoin('questions','questions.id','=','answers.question_id')
                ->select('answers.*','questions.question as question_name')
                ->get();
        }     
        return view('faq_seach',$data);
        
    }
    public function store(Request $request)
    {
        $input_all['firstname'] = $request->input('firstname');
        $input_all['lastname'] = $request->input('lastname');
        $input_all['email'] = $request->input('email');
        $input_all['question'] = $request->input('question');
        $input_all['status'] = $request->input('status');

        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Question::insert($data_insert);
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