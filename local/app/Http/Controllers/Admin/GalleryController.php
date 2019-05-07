<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_menu'] = 'GalleryAll';
        $data['sub_menu'] = 'Gallery';
        $data['title'] = 'Gallery';
        $data['title_page'] = 'Gallery';
        $data['menus'] = \App\Models\AdminMenu::ActiveMenu()->get();
        $data['GalleryTypes'] = \App\Models\GalleryType::get();
        return view('Admin.gallery',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_all = $request->all();
        
            if(isset($input_all['photo'])&&isset($input_all['photo'][0])){
                $input_all['photo'] = $input_all['photo'][0];
                if(Storage::disk("uploads")->exists("temp/".$input_all['photo'])&&!Storage::disk("uploads")->exists("Galleries/".$input_all['photo'])){
                    Storage::disk("uploads")->copy("temp/".$input_all['photo'],"Galleries/".$input_all['photo']);
                    Storage::disk("uploads")->delete("temp/".$input_all['photo']);
                }
            }
        
            if(isset($input_all['sort_id'])){
                $input_all['sort_id'] = str_replace(',', '', $input_all['sort_id']);
            }
            if(isset($input_all['link_video'])){
                $input_all['link_video'] = str_replace('watch?v=','embed/',$input_all['link_video']);
            }
        
        $input_all['status'] = $request->input('status','2');$input_all['type'] = $request->input('type','V');
        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
             
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Galleries::insert($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'สำเร็จ';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
            }
        }else{
            $return['status'] = 0;
        }
        $return['title'] = 'เพิ่มข้อมูล';
        return json_encode($return);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = \App\Models\Galleries::find($id);
        
            if($result){
                if($result->photo){
                    if(Storage::disk("uploads")->exists("Galleries/".$result->photo)){
                        if(Storage::disk("uploads")->exists("temp/".$result->photo)){
                            Storage::disk("uploads")->delete("temp/".$result->photo);
                        }
                        Storage::disk("uploads")->copy("Galleries/".$result->photo,"temp/".$result->photo);
                    }
                }
            }
        
        return json_encode($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input_all = $request->all();
        
            if(isset($input_all['photo'])&&isset($input_all['photo'][0])){
                $input_all['photo'] = $input_all['photo'][0];
                if(Storage::disk("uploads")->exists("temp/".$input_all['photo'])){
                    if(Storage::disk("uploads")->exists("Galleries/".$input_all['photo'])){
                        Storage::disk("uploads")->delete("Galleries/".$input_all['photo']);
                    }
                    Storage::disk("uploads")->copy("temp/".$input_all['photo'],"Galleries/".$input_all['photo']);

                }
            }else{
                $input_all['photo'] = null;
            }
            if(isset($input_all['org_photo'])){
                Storage::disk("uploads")->delete("temp/".$input_all['org_photo']);
            }
            unset($input_all['org_photo']);
        
            if(isset($input_all['sort_id'])){
                $input_all['sort_id'] = str_replace(',', '', $input_all['sort_id']);
            }
            if(isset($input_all['link_video'])){
                $input_all['link_video'] = str_replace('watch?v=','embed/',$input_all['link_video']);
            }
        $input_all['status'] = $request->input('status','2');
        $input_all['type'] = $request->input('type','V');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
             
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Galleries::where('id',$id)->update($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'สำเร็จ';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
            }
        }else{
            $return['status'] = 0;
        }
        $return['title'] = 'เพิ่มข้อมูล';
        return json_encode($return);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
            \App\Models\Galleries::where('id',$id)->delete();
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'สำเร็จ';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
        }
        $return['title'] = 'ลบข้อมูล';
        return $return;
    }

    public function Lists(){
        $result = \App\Models\Galleries::leftJoin('gallery_types','gallery_types.id','=','galleries.gallery_type_id')
            ->select('galleries.*','gallery_types.name as gallery_types_name');
        return \Datatables::of($result)
        ->addIndexColumn()
        ->addColumn('sort_id',function($rec){
            if(is_numeric($rec->sort_id)){
                return number_format($rec->sort_id);
            }else{
                return $rec->sort_id;
            }
        })
        ->editColumn('status',function($rec){
            if($rec->status == 1){
                return $status = '<span class="label label-success">เปิดใช้งาน</span>';
            }else {
                return $status = '<span class="label label-danger">ปิดใช้งาน</span>';
            }
        })
        ->editColumn('type',function($rec){
            if($rec->type == "P"){
                return $type = '<span class="label label-info">PHOTO</span>';
            }else {
                return $type = '<span class="label label-warning">VIDEO</span>';
            }
        })
        ->editColumn('photo',function($rec){
            if($rec->photo == null){
               
            }else {
                return $photo = ' <img src="'.asset('uploads/Galleries/'.$rec->photo).'" class="image-full image-btn" width="50%" height="50%" alt="holidayinn"/>';
            }
        })
        ->editColumn('link_video',function($rec){
            if($rec->link_video != null){
                return $link_video = '<iframe width="250" height="150" src="'.$rec->link_video.'" frameborder="0" allowfullscreen></iframe>';
            }
        })
        ->addColumn('action',function($rec){
            $str='
                <button data-loading-text="<i class=\'fa fa-refresh fa-spin\'></i>" class="btn btn-xs btn-warning btn-condensed btn-edit btn-tooltip" data-rel="tooltip" data-id="'.$rec->id.'" title="แก้ไข">
                    <i class="ace-icon fa fa-edit bigger-120"></i>
                </button>
                <button  class="btn btn-xs btn-danger btn-condensed btn-delete btn-tooltip" data-id="'.$rec->id.'" data-rel="tooltip" title="ลบ">
                    <i class="ace-icon fa fa-trash bigger-120"></i>
                </button>
            ';
            return $str;
        })->make(true);
    }

}
