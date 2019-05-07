<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function full_policy(){
        $data['full_policy'] = \App\Models\Policies::where('type','=','F')->select('policies.*')->first();
        return view('fullcomment',$data);
    }
    public function out_policy(){
        $data['out_policy'] = \App\Models\Policies::where('type','=','O')->select('policies.*')->first();
        return view('ourcomment',$data);
    }
}