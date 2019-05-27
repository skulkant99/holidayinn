<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['banner'] = \App\Models\Banner::select('banners.*')->orderBy('sort_id','ASC')->get();
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
        $data['content'] = \App\Models\Information::where('status','1')
            ->select('informations.*')
            ->paginate(3);
        $data['comment_all'] = \App\Models\Comment::select('comments.*')
            ->orderBy('id','DESC')
            ->paginate(3);
        $data['gallery'] = \App\Models\Galleries::leftJoin('gallery_types','gallery_types.id','galleries.gallery_type_id')
            ->select('galleries.*','gallery_types.name as gallery_name')
            ->orderBy('galleries.updated_at','DESC')
            ->paginate(3);
        $data['content'] = \App\Models\Information::select()->orderBy('id','DESC')->paginate(3);
        return view('index',$data);
    }
}