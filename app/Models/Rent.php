<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'renter_id',
        'tenant_id',
        'car_id',
        'rent_start',
        'rent_end',
    ];

    protected $dates = [
        'rent_start',
        'rent_end',
    ];

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id', 'id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
