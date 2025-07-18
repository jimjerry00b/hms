<?php

namespace App\Services;

use App\Models\FlatModel;

class FlatServices
{
    
    public function add($request){

        $result = FlatModel::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'house_id' => $request['house_id']
        ]);


        if($result){
            return true;
        }

        return false;
    }
}
