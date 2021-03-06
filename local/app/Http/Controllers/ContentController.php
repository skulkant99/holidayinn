<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContentController extends Controller
{
    public function detail($id){
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
        $data['gallery'] = \App\Models\Galleries::leftJoin('gallery_types','gallery_types.id','galleries.gallery_type_id')
            ->select('galleries.*','gallery_types.name as gallery_name')
            ->orderBy('galleries.updated_at','DESC')
            ->paginate(3);

        $view = \App\Models\Information::find($id);
        $page_view = $view->view+1;

        if($view) {
            $view->view = $page_view;
            $view->save();
        }
        
        return view('offer_inside',$data);
    }
    public function Countlike(Request $request ){
        $postid = $request->postid;
        $liked = $request->liked;
        $like = \App\Models\Information::find($postid);
        $like_contant = $like->like+$liked;

        if($like_contant){
            $like->like = $like_contant;
            $like->save();
        }

        return json_encode($like->like);
        
    }
}