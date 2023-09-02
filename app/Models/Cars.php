<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'brand',
        'model',
        'police_number',
        'rent_perday',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function rents()
    {
        return $this->hasMany(Rent::class, 'car_id', 'id');
    }
}
