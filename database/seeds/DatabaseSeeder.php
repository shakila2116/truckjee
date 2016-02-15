<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        DB::table('users')->truncate();
        DB::table('trucks')->truncate();
        DB::table('truck_model')->truncate();
        $this->call(UserTableSeeder::class);
//        $this->call(TruckAndModelTableSeeder::class);

        Model::reguard();
    }
}
