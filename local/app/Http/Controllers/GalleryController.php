<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $data['gallery_type'] = \App\Models\GalleryType::select('gallery_types.*')
            ->orderBy('sort_id','ASC')
            ->get();
        $data['gallery'] = \App\Models\Galleries::select('galleries.*')->get();
        return view('gallery',$data);
    }
}