<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectricMeter extends Model
{
    protected $fillable = ['flat_id', 'account_number', 'meter_number', 'monthly_bill'];

    public function flat()
    {
        return $this->belongsTo(FlatModel::class);
    }
}
