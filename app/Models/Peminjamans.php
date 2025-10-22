<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjamans extends Model
{

    protected $table = 'trips';

    protected $fillable = [
        'nama',
        'tujuan',
        'nopol',
        'tanggal',
        'status',
        'user_id',
        'car_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Cars::class);
    }
}
