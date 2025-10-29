<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'travel_destination',
        'start',
        'end',
        'status',
        'notes',
        'user_id',
        'car_id',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function car()
    {
        return $this->belongsTo(Cars::class, 'car_id');
    }
}
