<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{

     protected $fillable = [
        'tenant_id',
        'house_id',
        'month',
        'amount',
        'status',
        'payment_date',
        'note',
    ];


    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
