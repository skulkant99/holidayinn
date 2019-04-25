<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_menu'] = 'AdminUser';
        $data['sub_menu'] = 'AdminUser';
        $data['title_page'] = 'AdminUser';
        $data['menus'] = \App\Models\AdminMenu::ActiveMenu()->get();
        $data['menu_all'] = \App\Models\AdminMenu::with(['SubMenu','MainMenu'])->where('show','=','T')->get();

        return view('Admin.admin',$data);
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
        $input_all['password'] = \Hash::make($input_all['password']);
        if(isset($input_all['photo_profile'])&&isset($input_all['photo_profile'][0])){
            $input_all['photo_profile'] = $input_all['photo_profile'][0];
            if(Storage::disk("uploads")->exists("temp/".$input_all['photo_profile'])&&!Storage::disk("uploads")->exists("AdminUser/".$input_all['photo_profile'])){
                Storage::disk("uploads")->copy("temp/".$input_all['photo_profile'],"AdminUser/".$input_all['photo_profile']);
                Storage::disk("uploads")->delete("temp/".$input_all['photo_profile']);
            }
        }
        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['updated_at'] = date('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
            'username' => 'unique:admin_users',
            'email' => 'unique:admin_users',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\AdminUser::insert($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Finish';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Fail'.$e->getMessage();
            }
        }else{
            $failedRules = $validator->failed();
            if(isset($failedRules['username']['Unique'])) {
                $return['status'] = 2;
                $return['content'] = 'Username duplicate';
            } else if(isset($failedRules['email']['Unique'])) {
                $return['status'] = 2;
                $return['content'] = 'Email duplicate';
            } else {
                $return['status'] = 0;
            }
        }
        $return['title'] = 'Create data';
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
        $result = \App\Models\AdminUser::find($id);
        if($result){
            if($result->photo_profile){
                if(Storage::disk("uploads")->exists("AdminUser/".$result->photo_profile)){
                    if(Storage::disk("uploads")->exists("temp/".$result->photo_profile)){
                        Storage::disk("uploads")->delete("temp/".$result->photo_profile);
                    }
                    Storage::disk("uploads")->copy("AdminUser/".$result->photo_profile,"temp/".$result->photo_profile);
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
        $Valid = [];
        
        if(isset($input_all['photo_profile'])&&isset($input_all['photo_profile'][0])){
            $input_all['photo_profile'] = $input_all['photo_profile'][0];
            unset($input_all['org_photo_profile']);
            if(Storage::disk("uploads")->exists("temp/".$input_all['photo_profile'])){
                if(Storage::disk("uploads")->exists("AdminUser/".$input_all['photo_profile'])){
                    Storage::disk("uploads")->delete("AdminUser/".$input_all['photo_profile']);
                }
                Storage::disk("uploads")->copy("temp/".$input_all['photo_profile'],"AdminUser/".$input_all['photo_profile']);

            }
        }else{
            $input_all['photo_profile'] = null;
        }
        if(isset($input_all['org_photo_profile'])){
            Storage::disk("uploads")->delete("temp/".$input_all['org_photo_profile']);
        }
        unset($input_all['org_photo_profile']);
        
        $input_all['updated_at'] = date('Y-m-d H:i:s');
        $result = \App\Models\AdminUser::where('id',$id)->first();
        if ($result->email!=$input_all['email']) {
            $Valid = array('email' => 'unique:admin_users');
        }
        $validator = Validator::make($request->all(), []);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\AdminUser::where('id',$id)->update($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Finish';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Fail'.$e->getMessage();
            }
        }else{
            $failedRules = $validator->failed();
            if(isset($failedRules['email']['Unique'])) {
                $return['status'] = 2;
                $return['content'] = 'Email duplicate';
            } else {
                $return['status'] = 0;
            }
        }
        $return['title'] = 'Edit data';
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
            \App\Models\AdminUser::where('id',$id)->delete();
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Finish';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Fail'.$e->getMessage();
        }
        $return['title'] = 'Delete data';
        return $return;
    }

    public function Lists(){
        $result = \App\Models\AdminUser::select();
        return \Datatables::of($result)
        ->addColumn('name',function($rec) {
            return $rec->firstname.' '.$rec->lastname;
        })
        ->addColumn('action',function($rec){
            $str='
                <button data-loading-text="<i class=\'fa fa-refresh fa-spin\'></i>" class="btn btn-xs btn-warning btn-condensed btn-edit btn-tooltip" data-rel="tooltip" data-id="'.$rec->id.'" title="Edit">
                    <i class="ace-icon fa fa-edit bigger-120"></i>
                </button>
                <button  data-loading-text="<i class=\'fa fa-refresh fa-spin\'></i>" class="btn btn-xs btn-info btn-condensed btn-change-password btn-tooltip" data-rel="tooltip" data-id="'.$rec->id.'" title="Change password">
                    <i class="ace-icon fa fa-key bigger-120"></i>
                </button>
                <button  data-loading-text="<i class=\'fa fa-refresh fa-spin\'></i>" class="btn btn-xs btn-success btn-condensed btn-change-permission btn-tooltip" data-rel="tooltip" data-id="'.$rec->id.'" title="Permission manage">
                    <i class="ace-icon fa fa-lock bigger-120"></i>
                </button>
                <button  class="btn btn-xs btn-danger btn-condensed btn-delete btn-tooltip" data-id="'.$rec->id.'" data-rel="tooltip" title="Delete">
                    <i class="ace-icon fa fa-trash bigger-120"></i>
                </button>
            ';
            return $str;
        })->rawColumns(['active', 'action'])->addIndexColumn()->make(true);
    }

    public function change_password(Request $request){
        $id = $request->input('id');
        $password = $request->input('password');
        $new_password = \Hash::make($password);

        $validator = Validator::make($request->all(), [
            'password' => 'required'
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_update = [
                    'password'=>$new_password
                ];
                \App\Models\AdminUser::where('id',$id)->update($data_update);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Finish';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Fail'.$e->getMessage();
            }
        }else{
            $return['status'] = 0;
        }
        $return['title'] = 'Change password';
        return json_encode($return);
    }

}
