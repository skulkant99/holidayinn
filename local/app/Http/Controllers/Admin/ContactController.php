<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_menu'] = 'contactAll';
    	$data['sub_menu'] = 'contact';
    	$data['title'] = 'contact';
    	$data['title_page'] = 'contact';
        $data['menus'] = \App\Models\AdminMenu::ActiveMenu()->get();
        
    	return view('Admin.contact',$data);
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
            if(Storage::disk("uploads")->exists("temp/".$input_all['photo'])&&!Storage::disk("uploads")->exists("Contact/".$input_all['photo'])){
                Storage::disk("uploads")->copy("temp/".$input_all['photo'],"Contact/".$input_all['photo']);
                Storage::disk("uploads")->delete("temp/".$input_all['photo']);
            }
        }

        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Contact::insert($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Successfully added information';
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
        $result = \App\Models\Contact::find($id);
        
        if($result){
            if($result->photo){
                if(Storage::disk("uploads")->exists("Contact/".$result->photo)){
                    if(Storage::disk("uploads")->exists("temp/".$result->photo)){
                        Storage::disk("uploads")->delete("temp/".$result->photo);
                    }
                    Storage::disk("uploads")->copy("Contact/".$result->photo,"temp/".$result->photo);
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

        if(isset($input_all['photo'])&&isset($input_all['photo'][0])){
            $input_all['photo'] = $input_all['photo'][0];
            if(Storage::disk("uploads")->exists("temp/".$input_all['photo'])){
                if(Storage::disk("uploads")->exists("Contact/".$input_all['photo'])){
                    Storage::disk("uploads")->delete("Contact/".$input_all['photo']);
                }
                Storage::disk("uploads")->copy("temp/".$input_all['photo'],"Contact/".$input_all['photo']);

            }
        }else{
            $input_all['photo'] = null;
        }
        if(isset($input_all['org_photo'])){
            Storage::disk("uploads")->delete("temp/".$input_all['org_photo']);
        }
        unset($input_all['org_photo']);

        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Contact::where('id',$id)->update($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Successfully added information';
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
            \App\Models\Contact::where('id',$id)->delete();
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Successfully deleted information';
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
        $result = \App\Models\Contact::select();
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
                return $photo = ' <img src="'.asset('uploads/Contact/nophoto.png').'" class="image-full image-btn" width="50%" height="50%" alt="vchinese"/>';
            }else {
                return $photo = ' <img src="'.asset('uploads/Contact/'.$rec->photo).'" class="image-full image-btn" width="50%" height="50%" alt="vchinese"/>';
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
