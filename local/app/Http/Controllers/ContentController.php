<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function detail($id){
        $data['content_detail'] = \App\Models\Information::where('id',$id)
            ->select('informations.*')
            ->get();
        return view('offer_inside',$data);
    }
}