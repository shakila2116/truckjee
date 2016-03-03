<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement',function(Blueprint $table){
            $table->increments('id');
            $table->integer('status')->unsigned();//0 means not completed. one means completed
            $table->integer('user_id')->unsigned();
            $table->json('source'); //Store state, pincode, address details as json here
            $table->string('source_locality');
            $table->string('source_district');
            $table->json('destination'); //Store state, pincode, address details as json here
            $table->string('destination_locality');
            $table->string('destination_district');
            $table->json('truck_type');
            $table->dateTime('date_required');
            $table->dateTime('date_delivery');
            $table->integer('transit_time');
            $table->json('cargo_details');
            $table->json('payment_details');
            $table->dateTime('valid_till');
            $table->timestamps();
        });

        Schema::table('requirement', function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('requirement');
    }
}
