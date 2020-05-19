<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    public $table = "users";
    protected $guarded = [];

    protected $hidden = ['password'];

    public function shops()
    {
        return $this->hasMany(Shop::class, "user_id");
    }

    public function shopOrders()
    {
        return $this->hasMany(ShopOrder::class,'user_id');
    }

    public function wallet()
    {
        return $this->hasOne(UserWallet::class,"user_id");
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return [];
    }
}
