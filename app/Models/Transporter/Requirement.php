<?php

namespace TruckJee\Models\Transporter;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirement';


    protected $fillable = [
        'user_id',
        'source',
        'source_locality',
        'source_district',
        'destination',
        'destination_locality',
        'destination_district',
        'truck_type',
        'date_required',
        'date_delivery',
        'cargo_details',
        'payment_details',
        'valid_till',
        'transit_time'
    ];

    protected $casts = [
        'cargo_details'  => 'json',
        'truck_type'  => 'json',
        'payment_details'=> 'json',
        'source'        => 'json',
        'destination'   =>  'json'
    ];
}
