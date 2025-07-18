<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectricMeterMonthlyBill extends Model
{
    protected $table = 'electric_monthly_bills';
    protected $primaryKey = 'id';
    protected $guarded =[];
}
