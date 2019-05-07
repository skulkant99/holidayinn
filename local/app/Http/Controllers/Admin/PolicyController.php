<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_menu'] = 'PolicyAll';
        $data['sub_menu'] = 'Full comment policy';
        $data['title'] = 'Full comment policy';
        $data['title_page'] = 'Full comment policy';
        $data['menus'] = \App\Models\AdminMenu::ActiveMenu()->get();
        
        return view('Admin.policy',$data);
    }

    public function ourpolicy()
    {
        $data['main_menu'] = 'PolicyAll';
        $data['sub_menu'] = 'Our policy on commenting';
        $data['title'] = 'Our policy on commenting';
        $data['title_page'] = 'Our policy on commenting';
        $data['menus'] = \App\Models\AdminMenu::ActiveMenu()->get();
        
        return view('Admin.ourpolicy',$data);
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
        $input_all['status'] = $request->input('status','2');
        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
            'detail' => 'required',
             
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Policies::insert($data_insert);
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
        $result = \App\Models\Policies::find($id);
        
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
        $input_all['status'] = $request->input('status','2');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
            'detail' => 'required',
             
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\Policies::where('id',$id)->update($data_insert);
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
            \App\Models\Policies::where('id',$id)->delete();
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
        $result = \App\Models\Policies::where('type','=','F')->select();
        return \Datatables::of($result)
        ->addIndexColumn()
        ->editColumn('status',function($rec){
            if($rec->status == 1){
                return $status = '<span class="label label-success">เปิดใช้งาน</span>';
            }else {
                return $status = '<span class="label label-danger">ปิดใช้งาน</span>';
            }
        })
        ->editColumn('type',function($rec){
            if($rec->type == 'F'){
                return $type = '<span>Full comment policy</span>';
            }else {
                return $type = '<span>Our policy on commenting</span>';
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

    
    public function ListsOurpolicy(){
        $result = \App\Models\Policies::where('type','=','O')->select();
        return \Datatables::of($result)
        ->addIndexColumn()
        ->editColumn('status',function($rec){
            if($rec->status == 1){
                return $status = '<span class="label label-success">เปิดใช้งาน</span>';
            }else {
                return $status = '<span class="label label-danger">ปิดใช้งาน</span>';
            }
        })
        ->editColumn('type',function($rec){
            if($rec->type == 'O'){
                return $type = '<span>Our policy on commenting</span>';
            }else {
                return $type = '<span>Full comment policy</span>';
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
