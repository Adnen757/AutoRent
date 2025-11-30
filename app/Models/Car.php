<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'year',
        'fuel_type',
        'seats',
        'transmission',
        'price_per_day',
        'image',
        'description',
        'available',
    ];

    protected $casts = [
        'available' => 'boolean',
        'price_per_day' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('available', true);
    }
}
