<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'nid',
        'flat_id',
        'house_id',
        'move_in_date',
        'move_out_date',
    ];

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }


    public function flat()
    {
        return $this->hasMany(FlatModel::class, 'id');
    }

    
}
