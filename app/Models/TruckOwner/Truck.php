<?php

namespace TruckJee\Models\TruckOwner;

use Illuminate\Database\Eloquent\Model;
use TruckJee\User;

class Truck extends Model
{

    protected $table = 'trucks';

    protected $fillable =[
        'truck_number',
        'short_form',
        'model_id',
        'owner_id',
        'imei',
        'rc',
        'insurance',
        'authorization',
        'pollution',
        'np'
    ];

    public function scopegetTrucksOfUser($query, $id)
    {
        return $query->where('owner_id','=',$id)->get();
    }

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
