<?php

namespace TruckJee\Models\Transporter;

class CargoDetails
{
    public      $packing,
                $material,
                $max_weight,
                $cargo_value,
                $material_insurance;

    public function __construct(array $data)
    {
        $this->packing      = $data['packing'];
        $this->material     = $data['material'];
        $this->max_weight   = $data['max_weight'];
        $this->cargo_value  = $data['cargo_value'];
        $this->material_insurance    = $data['material_insurance'];

        return $this->getJson();
    }

    public function getJson()
    {
        return json_encode($this);
    }
}