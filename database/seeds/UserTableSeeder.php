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
        factory(TruckJee\User::class, 'owner',20)
            ->create()
            ->each(function($user){
                $user->tj_id = getOwnerId($user->id);
                $user->save();
            });
    }
}
