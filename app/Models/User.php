<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{

    use Authenticatable, Authorizable, HasFactory, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone_number', 'driving_license_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function cars()
    {
        return $this->hasMany(Cars::class);
    }
    public function rents()
    {
        return $this->hasMany(Rent::class, 'renter_id', 'id');
    }
}
