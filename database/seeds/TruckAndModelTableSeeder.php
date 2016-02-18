<?php

use Illuminate\Database\Seeder;

class TruckAndModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TruckJee\Models\TruckOwner\TruckModel::class, 'truck_model')->create();
    }
}
