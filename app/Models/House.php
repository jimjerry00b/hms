<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'unit'
    ];

    public function tenant()
    {
        return $this->hasOne(Tenant::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function flats() {
        return $this->hasMany(FlatModel::class);
    }
}
