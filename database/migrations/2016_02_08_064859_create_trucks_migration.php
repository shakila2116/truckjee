<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_model',function(Blueprint $table){
            $table->increments('id');
            $table->string('search_term')->unique();
            $table->string('model_name')->unique();
            $table->string('manufacturer');
            $table->string('dimension');
            $table->string('max_capacity',10);
            $table->string('wheels',10);
            $table->string('type',10);
            $table->string('axle',10);
            $table->timestamps();

        });


        Schema::create('trucks',function(Blueprint $table){
            $table->increments('id');
            $table->string('truck_id')->unique();
            $table->string('truck_number')->unique();
            $table->integer('owner_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('status');
            $table->string('short_form');
            $table->string('imei',16);
            $table->string('current_location_city');
            $table->string('current_location_state');
            $table->string('rc');
            $table->string('insurance');
            $table->string('pollution');
            $table->string('np');
            $table->string('authorization');
            $table->timestamps();
        });



        Schema::table('trucks',function($table){
            $table->foreign('model_id')->references('id')->on('truck_model');
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trucks');
        Schema::drop('truck_model');
    }
}
