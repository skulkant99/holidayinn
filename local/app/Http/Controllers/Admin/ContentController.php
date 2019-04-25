<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_menu'] = 'จัดการเนื้อหา';
    	$data['sub_menu'] = '';
    	$data['title'] = 'จัดการเนื้อหา';
    	$data['title_page'] = 'จัดการเนื้อหา';
    	// $data['permission'] = Permission::CheckPermission($data['main_menu'],$data['sub_menu']);
    	$data['menus'] = \App\Models\AdminMenu::ActiveMenu()->get();
        return view('Admin.content',$data);
    }

   
}
