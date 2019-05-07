<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_menu'] = 'information';
    	$data['sub_menu'] = 'information';
    	$data['title'] = 'information';
    	$data['title_page'] = 'information';
    	$data['menus'] = \App\Models\AdminMenu::ActiveMenu()->get();
    	return view('Admin.information',$data);
    }
    public function Comment($id)
    {
        $data['main_menu'] = 'Comment';
    	$data['sub_menu'] = 'Comment';
    	$data['title'] = 'Comment';
    	$data['title_page'] = 'Comment';
        $data['menus'] = \App\Models\AdminMenu::ActiveMenu()->get();
        $data['id'] = $id;
    	return view('Admin.comment',$data);
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
        $file_name = [];

        if(isset($input_all['photo'])){
            foreach($input_all['photo'] as $key=>$val){
                //$input_all['photo'] = $input_all['photo'][$key];
                if(Storage::disk("uploads")->exists("temp/".$input_all['photo'][$key])&&!Storage::disk("uploads")->exists("Information/".$input_all['photo'][$key])){
                    Storage::disk("uploads")->copy("temp/".$input_all['photo'][$key],"Information/".$input_all['photo'][$key]);
                    Storage::disk("uploads")->delete("temp/".$input_all['photo'][$key]);
                    $file_name[] = $input_all['photo'][$key];
                }
            }
        }
        $input_all['photo'] = json_encode($file_name);

        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Information::insert($data_insert);
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
        $result = \App\Models\Information::find($id);
            
            if($result){
                if($result->photo){
                    $photos = json_decode($result->photo);
                    if(sizeof($photos) > 0){
                        foreach($photos as $photo){
                            if(Storage::disk("uploads")->exists("Information/".$photo)){
                                if(Storage::disk("uploads")->exists("temp/".$photo)){
                                    Storage::disk("uploads")->delete("temp/".$photo);
                                }
                                Storage::disk("uploads")->copy("Information/".$photo,"temp/".$photo);
                            }
                        }
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
        //
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

        $file_name = [];
        if(isset($input_all['photo'])){
            //$input_all['photo'] = $input_all['photo'][0];
            //unset($input_all['org_photo']);
            foreach($input_all['photo'] as $key=>$val){
                if(Storage::disk("uploads")->exists("temp/".$input_all['photo'][$key])&&!Storage::disk("uploads")->exists("Information/".$input_all['photo'][$key])){
                    Storage::disk("uploads")->copy("temp/".$input_all['photo'][$key],"Information/".$input_all['photo'][$key]);
                    Storage::disk("uploads")->delete("temp/".$input_all['photo'][$key]);
                }
                $file_name[] = $input_all['photo'][$key];
            }
        }
        if(isset($input_all['org_photo'])){
            Storage::disk("uploads")->delete("temp/".$input_all['org_photo']);
        }
        unset($input_all['org_photo']);
        $input_all['photo'] = json_encode($file_name);

        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Information::where('id',$id)->update($data_insert);
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
            \App\Models\Information::where('id',$id)->delete();
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
    public function Lists()
    {
        $result = \App\Models\Information::select();
        return \Datatables::of($result)
        ->addIndexColumn()
        ->editColumn('status',function($rec){
            if($rec->status == 1){
                return $status = '<span class="label label-success">เปิดใช้งาน</span>';
            }else {
                return $status = '<span class="label label-danger">ปิดใช้งาน</span>';
            }
        })
        ->editColumn('photo',function($rec){
            if($rec->photo == null){
                  return $photo = ' <img src="'.asset('uploads/Information/nophoto.png').'" class="image-full image-btn" width="70" height="70" alt="holidayinn"/>';
            }else{
              foreach (json_decode($rec->photo) as $photo_content) {
                 return $photo = ' <img src="'.asset('uploads/Information/'.$photo_content).'" class="image-full image-btn" width="70" height="70" alt="holidayinn"/>';
                 break;
              }
            }
        })
        ->addColumn('action',function($rec){
            $str='
                <a href="'.url('admin/Information/Comment/'.$rec->id).'" data-loading-text="<i class=\'fa fa-refresh fa-spin\'></i>" class="btn btn-xs btn-success btn-condensed btn-select btn-tooltip" data-rel="tooltip" data-id="'.$rec->id.'" title="comment">
                    <i class="ace-icon fa fa-plus bigger-120"></i>
                </a>
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
    public function ListsComment(Request $request)
    {
        $information_id = $request->input('information_id');
        $result = \App\Models\Comment::where('information_id',$information_id)->select();
        return \Datatables::of($result)
        ->addIndexColumn()
        ->editColumn('status',function($rec){
            if($rec->status == 1){
                return $status = '<span class="label label-success">เปิดใช้งาน</span>';
            }else {
                return $status = '<span class="label label-danger">ปิดใช้งาน</span>';
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
