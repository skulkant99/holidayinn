<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class SeachController extends Controller
{

    public function seach(Request $request)
    {
        $name_seach = $request->has('name') ? $request->input('name') : null;

        if($name_seach != null){
            $data['ask'] = \App\Models\Answer::leftJoin('questions','questions.id','=','answers.question_id')
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
   
    
}