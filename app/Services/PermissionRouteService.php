<?php

namespace App\Services;
use App\Models\PermisionToRouteModel;
class PermissionRouteService
{

    public function add($request)
    {
        PermisionToRouteModel::create([
            'router' => $request['router'],
            'permission_id' => $request['permission_id'],
        ]);
    }
}
