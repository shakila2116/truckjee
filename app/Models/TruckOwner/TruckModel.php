<?php

namespace TruckJee\Models\TruckOwner;

use Illuminate\Database\Eloquent\Model;

class TruckModel extends Model
{
    protected $table = 'truck_model_details';

    protected $fillable =[
        'manufacturer',
        'model_name',
        'dimension',
        'max_capacity',
        'wheels',
        'type',
        'axle'
    ];
}
