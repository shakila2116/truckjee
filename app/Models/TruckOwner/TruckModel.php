<?php

namespace TruckJee\Models\TruckOwner;

use Illuminate\Database\Eloquent\Model;

class TruckModel extends Model
{
    protected $table = 'truck_models';

    protected $fillable = [
        'model_id',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['created_at','updated_at'];
}
