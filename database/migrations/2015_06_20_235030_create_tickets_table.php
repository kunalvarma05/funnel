<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function(Blueprint $table){
            $table->increments('id');
            $table->string('tracking_id')->nullable();
            $table->string('content')->nullable();
            $table->string('status')->default('open')->nullable();
            $table->string('priority')->default('low')->nullable();
            $table->string('tweet_id')->nullable();
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
        Schema::drop('tickets');
    }
}
