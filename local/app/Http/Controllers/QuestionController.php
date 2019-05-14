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
        $data['ask'] = \App\Models\Question::leftJoin('answers','answers.question_id','=','questions.id')
            ->select('questions.*','answers.answer as answer_name')
            ->get();

        return view('faq',$data);
    }
    public function seach(Request $request)
    {
        $name_seach = $request->has('name') ? $request->input('name') : null;
        if($name_seach != null){
            $patients = \App\Models\Question::leftJoin('answers','answers.question_id','=','questions.id')
                ->select('questions.*','answers.answer as answer_name')
                ->where('answers.answer','like','%'.$name_seach.'%')
                ->orWhere('questions.question','like','%'.$name_seach.'%')
                ->get();
              
        }else{
            $patients= \App\Models\Question::leftJoin('answers','answers.question_id','=','questions.id')
                ->select('questions.*','answers.answer as answer_name')
                ->get();
        }     
        return response()->json($patients);
        
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
            'email' => 'required|email'
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
            $return['content'] = 'Invalid email format';
        }
        $return['title'] = 'Warning';
        return json_encode($return);
    }
    
}