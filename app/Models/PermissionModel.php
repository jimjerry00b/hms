<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $guarded =[];

    public function roles(){
        return $this->belongsToMany(RoleModel::class, 'permission_role', 'permission_id', 'role_id');
    }
}
