<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['banner'] = \App\Models\Banner::select('banners.*')->orderBy('sort_id','ASC')->get();
        $data['content'] = \App\Models\Information::where('status','1')
            ->select('informations.*')
            ->paginate(3);
        $data['comment_all'] = \App\Models\Comment::select('comments.*')
            ->orderBy('id','DESC')
            ->paginate(3);
        $data['content'] = \App\Models\Information::select()->orderBy('id','DESC')->paginate(3);
        return view('index',$data);
    }
}