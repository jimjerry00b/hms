<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    function add($request){
        $result = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => $request['role_id']
        ]);


        if($result){
            return true;
        }

        return false;
    }

    function update($request, $permissionToRole){
        $permissionToRole->update(collect($request)->toArray());
    }
}
