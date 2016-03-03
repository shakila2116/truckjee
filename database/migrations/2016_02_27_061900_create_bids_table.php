<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids',function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('requirement_id')->unsigned();
            $table->string('bid_amount');
            $table->json('selected_trucks');
            $table->tinyInteger('rejected');//0 if not rejected, 1 if rejected
            $table->timestamps();
        });

        Schema::table('bids', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('requirement_id')->references('id')->on('requirement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bids');
    }
}
