<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermisionToRouteModel extends Model
{
    protected $table = 'permission_route';
    protected $primaryKey = 'id';
    protected $guarded =[];


    public function permission(){
        return $this->belongsTo(PermissionModel::class);
    }
}
