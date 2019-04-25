<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrudPermission extends Model
{
    protected $table = 'crud_permissions';

    public function AdminMenu(){
    	return $this->hasOne('\App\Models\AdminMenu','id','menu_id');
    }
}
