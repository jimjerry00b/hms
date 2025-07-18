<?php

namespace App\Services;

use App\Models\House;
use Exception;

class HouseService
{
    function add($request){        
        $result = House::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'unit' => $request['units'],
            'description' => $request['description']
        ]);


        if($result){
            return true;
        }

        return false;
    }

    // function update($request, $permissionToRole){
    //     $permissionToRole->update(collect($request)->toArray());
    // }

    function delete($house){
        try {            
            $house->delete();
        } catch (Exception $e) {
            throw new Exception("Something was wrong.", 500);
        }
    }
}
