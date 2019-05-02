<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $searchword = $request->input('search');
        $data['info'] = \App\Models\Information::select('informations.*')
            ->where('informations.title','like','%'.$searchword.'%')
            ->orWhere('informations.detail','like','%'.$searchword.'%')
            ->paginate(3);

        $data['qu'] = \App\Models\Question::leftJoin('answers','answers.question_id','=','questions.id')
            ->select('questions.*','answers.answer as answer_name')
            ->where('answers.answer','like','%'.$searchword.'%')
            ->orWhere('questions.question','like','%'.$searchword.'%')
            ->paginate(3);
        
        // $name_seach = $request->has('name') ? $request->input('name') : null;

        // if($name_seach != null){
        //     $patients = \App\Models\Information::select('informations.*')
        //         ->where('informations.title','like','%'.$name_seach.'%')
        //         ->orWhere('informations.detail','like','%'.$name_seach.'%')
        //         ->paginate(3);
        // }else{
        //     $patients = \App\Models\Information::select('informations.*')->paginate(3);
        // }     
        // // return view('faq_seach',$data);
        // return response()->json($patients);
        return view('search',$data);
        
    }
   
    
}