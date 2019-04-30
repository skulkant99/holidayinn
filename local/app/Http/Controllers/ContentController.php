<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function detail($id){
        $data['content_detail'] = \App\Models\Information::where('id',$id)
            ->select('informations.*')
            ->get();
        $data['comment'] = \App\Models\Comment::where('information_id',$id)
            ->select('comments.*')
            ->orderBy('id','DESC')
            ->get();
         $data['comment_all'] = \App\Models\Comment::select('comments.*')
            ->orderBy('id','DESC')
            ->paginate(3);
        $data['id'] = $id;
        $data['content'] = \App\Models\Information::select()->orderBy('id','DESC')->paginate(3);
        $view = \App\Models\Information::find($id);
        $page_view = $view->view+1;

        if($view) {
            $view->view = $page_view;
            $view->save();
        }
        
        return view('offer_inside',$data);
    }
}