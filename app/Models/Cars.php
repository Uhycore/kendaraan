<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'description'
    ];
}
