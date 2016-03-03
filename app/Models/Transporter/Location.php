<?php

namespace TruckJee\Models\Transporter;

class Location
{
    public   $state,
                $district,
                $city,
                $pincode,
                $formatted_address;

    public function __construct(array $data, $type)
    {
        $this->state = $data[$type.'_level_1'];
        $this->district = $data[$type.'_level_2'];
        $this->city = $data[$type.'_locality'];
        $this->pincode = $data[$type.'_postal_code'];
        $this->formatted_address = $data[$type];
        return $this->getJson();
    }

    public function getJson()
    {
        return json_encode($this);
    }
}