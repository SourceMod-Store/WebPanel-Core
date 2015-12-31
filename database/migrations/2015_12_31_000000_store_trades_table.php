<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for store categories
        Schema::connection('store')->create('trades', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('sender_id')->unsigned();
            $table->integer('receiver_id')->unsigned();
            $table->string('sender_items',255)->nullable();
            $table->string('receiver_items',255)->nullable();
            $table->integer('sender_credits')->nullable()->unsigned();
            $table->integer('receiver_credits')->nullable()->unsigned();
            $table->enum('status',['created','accepted','declined-sender','declined-receiver']);
            $table->timestamps();


            $table->foreign('sender_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('store')->drop('trades');
    }
}
