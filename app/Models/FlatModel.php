<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlatModel extends Model
{
    protected $table = 'flats';
    protected $primaryKey = 'id';
    protected $guarded =[];


    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function tenant()
    {
        return $this->hasOne(Tenant::class);
    }

    public function electricityBills()
    {
        return $this->hasOne(ElectricMeter::class, 'flat_id');
    }

    public function electricityBillsNew()
    {
        return $this->hasOne(ElectricMeter::class, 'flat_id');
    }

    public function getElectricityMonthlyBill()
    {
        return $this->hasOne(ElectricMeterMonthlyBill::class, 'electric_meter_id');
    }
}


