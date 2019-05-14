<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
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
        $data['gallery_type'] = \App\Models\GalleryType::select('gallery_types.*')
            ->orderBy('sort_id','ASC')
            ->get();
        $data['gallery'] = \App\Models\Galleries::select('galleries.*')->get();
        return view('gallery',$data);
    }
}