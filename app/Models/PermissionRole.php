<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    protected $primaryKey = 'id';
    protected $guarded =[];


    public function role(){
        return $this->belongsTo(RoleModel::class);
    }

    public function permission(){
        return $this->belongsTo(PermissionModel::class);
    }
}
