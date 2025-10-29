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
        'vehicle_type',
        'status',
        'tanggal_pengurusan',
        'masa_berlaku_pajak_1_tahun',
        'masa_berlaku_pajak_5_tahun',
        'uji_kir',
        'keterangan',
        'description',
        'image',
    ];


    public function trips()
    {
        return $this->hasMany(Trip::class, 'car_id');
    }
}
