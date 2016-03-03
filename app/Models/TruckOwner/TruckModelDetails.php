<?php

namespace TruckJee\Models\TruckOwner;

use Illuminate\Database\Eloquent\Model;

class TruckModelDetails extends Model
{
    protected $table    =   'truck_model_details';

    protected $fillable =[
        'model_id',
        'manufacturer',
        'model_name',
        'dimension',
        'max_capacity',
        'wheels',
        'type',
        'axle'
    ];
}
