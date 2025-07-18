<?php

namespace App\Services;

use App\Models\PermissionRole;

class PermissionToRoleService
{
    /**
     * Create a new class instance.
     */
    function add($request){

        $isExistance = PermissionRole::where('role_id', $request['role_id'])->where('permission_id', $request['permission_id'])->get();

        if (count($isExistance) !== 0){
            return redirect()->back()->with('error', 'It is already exist');
        }

        PermissionRole::create([
            'role_id' => $request['role_id'],
            'permission_id' => $request['permission_id'],
        ]);
    }

    function update($request, $permissionToRole){
        $permissionToRole->service->update($request->validated, $permissionToRole);
    }
}
