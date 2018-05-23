<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients',function(Blueprint $table){
            $table->increments('id');
            $table->string('name',255);
            $table->string('CPF',255);
            $table->string('RG',255);
            $table->integer('years');
            $table->string('cellphone',255);
            $table->string('phone',255);
            $table->string('city',255);
            $table->string('state',255);
            $table->string('district',255);
            $table->string('zipcode',255);
            $table->string('address',255);
            $table->integer('address_number');
            $table->integer('coupon_id')->unsigned();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
