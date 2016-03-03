<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TruckJee\User::class, 'admin')->create();
        factory(TruckJee\User::class, 'truck-owner')->create();
        factory(TruckJee\User::class, 'transporter')->create();
        factory(TruckJee\User::class,20)
            ->create()
            ->each(function($user){
                $user->tj_id = getOwnerId($user->id);
                $user->save();
                factory(\TruckJee\Models\UserDetails::class)->create(['user_id'=>$user->id]);
            });
    }
}
