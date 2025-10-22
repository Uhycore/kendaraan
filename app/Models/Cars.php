<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Cars extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'year',
        'color',
        'price',
        'plate_number',
        'transmission',
        'fuel_type',
        'status',
        'description',
        'vehicle_type',
        'image',
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjamans::class, 'car_id');
    }


}
