<?php

namespace App\Services;

use App\Models\Rent;
use App\Models\Tenant;
use Carbon\Carbon;

class RentsService
{
    function add($request){  
        $tenant = Tenant::find($request['tenant_id']);
        
        $result = Rent::create([
            'tenant_id' => $tenant->id,
            'house_id' => $tenant->house_id,
            'month' => $request['month'],
            'amount' => $request['amount'],
            'status' => $request['status'],
            'payment_date' => $request['payment_date'],
            'note' => $request['note'],
        ]);

    

        if($result){
            return true;
        }

        return false;
    }
}
