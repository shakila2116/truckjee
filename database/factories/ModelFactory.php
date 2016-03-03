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

$factory->defineAs(TruckJee\User::class, 'truck-owner' ,function (Faker\Generator $faker) {
    return [
        'name' => 'TruckJee Truck Owner',
        'tj_id' => getOwnerId(2),
        'email' => 'to@truckjee.com',
        'phone' => $faker->numberBetween($min = 7000000000, $max = 9999999999),
        'password' => bcrypt('younus'),
        'role'  => 1,
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(TruckJee\User::class, 'transporter' ,function (Faker\Generator $faker) {
    return [
        'name' => 'TruckJee Transporter',
        'email' => 'tr@truckjee.com',
        'tj_id' => getTransporterId(3),
        'phone' => $faker->numberBetween($min = 7000000000, $max = 9999999999),
        'password' => bcrypt('younus'),
        'role'  => 2,
        'remember_token' => str_random(10),
    ];
});

$factory->define(TruckJee\User::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'tj_id' => $faker->email,
        'phone' => $faker->numberBetween($min = 7000000000, $max = 9999999999),
        'password' => bcrypt('younus'),
        'role'  => 1,
        'remember_token' => str_random(10),
    ];
});

$factory->define(TruckJee\Models\TruckOwner\Truck::class, function(Faker\Generator $faker){
    return [
        'truck_id'          => $faker->email,
        'truck_number'      =>  $faker->regexify('^[A-Z]{2}-[0-9]{2}-[A-Z]{2}-[0-9]{4}$'),
        'owner_id'          =>  1,
        'model_id'          =>  1,
        'description_id'    =>  1,
        'status'            =>  0,
        'short_form'        =>  'Truck Short Form',
        'current_locality'  =>  'Chennai',
        'current_district'  =>  'Chennai'
    ];
});


$factory->define(\TruckJee\Models\UserDetails::class, function(Faker\Generator $faker){
    return [
        'user_id'           => $faker->email,
        'document_number'   => $faker->creditCardNumber,
        'dob'               => $faker->dateTime,
        'gender'            => 'male',
        'anniversary'       => $faker->dateTime,
        'address'           => $faker->address,
        'association_name'  => $faker->city,
        'association_id'    => $faker->creditCardNumber,
        'company_name'      => $faker->company,
        'company_type'      => 1,
        'company_address'   => $faker->address,
        'company_landline'  => $faker->phoneNumber,
        'company_mobile'    => $faker->phoneNumber,
        'company_website'   => $faker->url,
        'trucks_owned'      => 10
    ];
});


