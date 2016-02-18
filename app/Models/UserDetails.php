<?php

namespace TruckJee\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'document_number',
        'dob',
        'gender',
        'anniversary',
        'address',
        'association_name',
        'association_id',
        'company_name',
        'company_type',
        'company_address',
        'company_landline',
        'company_mobile',
        'company_website',
        'trucks_owned'
    ];
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

}
