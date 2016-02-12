<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->defineAs(TruckJee\User::class, 'admin' ,function (Faker\Generator $faker) {
    return [
        'name' => 'TruckJee Admin',
        'email' => 'itsme@theyounus.com',
        'phone' => $faker->numberBetween($min = 7000000000, $max = 9999999999),
        'password' => bcrypt('younus'),
        'role'  => 0,
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(TruckJee\User::class, 'owner' ,function (Faker\Generator $faker) {
    return [
        'tj_id' =>  $faker->email,
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->numberBetween($min = 7000000000, $max = 9999999999),
        'password' => bcrypt('younus'),
        'role'  => 1,
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(TruckJee\Models\TruckOwner\TruckModel::class,'truck_model', function(){
    return [
        'manufacturer'  =>  'Mahendra',
        'search_term'   =>  '19Ft-FTL',
        'model_name'    =>  'MXL25',
        'dimension'     =>  'LxBxH',
        'max_capacity'  =>  '25MT',
        'wheels'        =>  '12',
        'type'          =>  'Container',
        'axle'          =>  '2'
    ];
});

$factory->defineAs(TruckJee\Models\TruckOwner\TruckModel::class,'truck_model1', function(){
    return [
        'manufacturer'  =>  'Ashok Leyland',
        'search_term'   =>  '21Ft-FTL',
        'model_name'    =>  'MXL21',
        'dimension'     =>  'LxBxH',
        'max_capacity'  =>  '21MT',
        'wheels'        =>  '10',
        'type'          =>  'Open',
        'axle'          =>  '2'
    ];
});
