<?php

namespace App\Services;

use App\Models\RoleModel;
use Exception;

class RoleService
{

    function add($request){
        $result = RoleModel::create([
            'name' => $request['name'],
        ]);

        if($result){
            return true;
        }
        return false;
    }

    function update($data, $role)
    {
        $role->update(collect($data)->toArray());
    }

    function delete($role)
    {
        try {
            $role->delete();
        } catch (Exception $e) {
            throw new Exception("Something was wrong.", 500);
        }
    }
}
