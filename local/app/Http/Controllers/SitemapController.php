<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
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
        $data['GalleryType'] = \App\Models\GalleryType::select()->get();
        $data['category'] = \App\Models\Category::select()->get();
        return view('sitemap',$data);
    }
    
}