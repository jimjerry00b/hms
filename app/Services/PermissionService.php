<?php

namespace App\Services;

use App\Models\PermissionModel;

class PermissionService
{

    public function add($request){

        PermissionModel::create([
            'name' => $request['name'],
        ]);

    }
}
