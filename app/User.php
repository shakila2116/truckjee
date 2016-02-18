<?php

namespace TruckJee;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','phone','tj_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOwners($query)
    {
        return $query->where('role','=',1);
    }

    public function scopeTransporters($query)
    {
        return $query->where('role','=',2);
    }

    public function getDetails()
    {
        return $this->hasOne('TruckJee\Models\UserDetails','user_id');
    }

    /**
     * Used to get the trucks of a particular user
     *
     * @return mixed
     */
    public function trucks()
    {
        return $this->hasMany('TruckJee\Models\TruckOwner\Truck','owner_id')->get();
    }
}
