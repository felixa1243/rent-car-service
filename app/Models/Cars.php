<?php
namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use Uuids;
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'brand',
        'model',
        'police_number',
        'rent_perday',
        'owner_id',
        'availability'
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
