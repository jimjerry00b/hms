<?php

namespace App\Services;

use App\Models\ElectricMeter;
use App\Models\ElectricMeterMonthlyBill;
use Exception;

class ElectricMeterServices
{
    
    function add($data){
        $result = ElectricMeter::create([
            'flat_id' => $data['flat_id'],
            'account_number' => $data['account_number'],
            'meter_number' => $data['meter_number']
        ]);


        if($result){
            return true;
        }

        return false;

    }
    

    function update($data, $info)
    {
        $info->update(collect($data)->toArray());
    }

    function delete($data){
        try {            
            $data->delete();
        } catch (Exception $e) {
            throw new Exception("Something was wrong.", 500);
        }
    }


    function billAdd($data){
        
        // dd($data['electric_meter_id']);

        $result = ElectricMeterMonthlyBill::create([
            'month_year' => $data['month_year'],
            'monthly_bill' => $data['monthly_bill'],
            'electric_meter_id' => $data['electric_meter_id']
        ]);


        if($result){
            return true;
        }

        return false;

    }
    
}
