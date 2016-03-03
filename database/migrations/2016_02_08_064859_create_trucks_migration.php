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
        Schema::create('truck_models',function(Blueprint $table){
            $table->increments('id');
            $table->string('model_id');
            $table->timestamps();

        });

        Schema::create('truck_model_details',function(Blueprint $table){
            $table->increments('id');
            $table->integer('model_id')->unsigned();
            $table->string('model_name');
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
            $table->integer('description_id')->unsigned();
            $table->string('status'); //0-empty 1-transaction
            $table->string('short_form');
            $table->string('imei',16);
            $table->string('current_locality');
            $table->string('current_district');
            $table->string('rc');
            $table->string('insurance');
            $table->string('pollution');
            $table->string('np');
            $table->string('authorization');
            $table->timestamps();
        });



        Schema::table('trucks',function($table){
            $table->foreign('model_id')->references('id')->on('truck_models');
            $table->foreign('description_id')->references('id')->on('truck_model_details');
            $table->foreign('owner_id')->references('id')->on('users');
        });

        Schema::table('truck_model_details', function($table){
            $table->foreign('model_id')->references('id')->on('truck_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('truck_model_details');
        Schema::dropIfExists('truck_models');
        Schema::dropIfExists('trucks');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
