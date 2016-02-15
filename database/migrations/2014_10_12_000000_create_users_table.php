<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('tj_id')->unique();
            $table->string('phone',10)->unique();
            $table->string('password', 60);
            $table->integer('role');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_details', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('document_number');
            $table->date('dob');
            $table->string('gender');
            $table->date('anniversary');
            $table->string('address');
            $table->string('id_proof');
            $table->string('association_name');
            $table->string('association_id');
            $table->string('company_name');
            $table->string('company_type');
            $table->string('company_proof');
            $table->integer('trucks_owned');
            $table->string('no_employees');
            $table->string('company_address');
            $table->string('company_landline');
            $table->string('company_mobile');
            $table->string('company_website');
        });

        Schema::table('user_details',function($table){
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
        Schema::drop('user_details');
        Schema::drop('users');

    }
}
