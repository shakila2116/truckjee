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
        'description_id',
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

    public function scopeGetEmptyTrucks($query,$truck_types, $source_district, $source_locality)
    {
        return $query->whereIn('model_id',$truck_types)
                    ->where('status','=','0')
                    ->where(function($q) use($source_locality, $source_district){
                        $q->where('current_locality','=',$source_locality)
                            ->orWhere('current_district','=',$source_district);
                    })
                    ->get();
    }

    public function owner()
    {
        return $this->belongsTo('TruckJee\User')->first();
    }
}
