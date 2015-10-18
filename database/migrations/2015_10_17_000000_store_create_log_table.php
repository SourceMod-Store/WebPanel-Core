<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreCreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for store categories
        Schema::connection('store')->create('log', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->dateTime('datetime');
            $table->integer('server_id')->unsigned();
            $table->enum('severity',['Emergency', 'Alert', 'Critical', 'Error', 'Warning', 'Notice', 'Informational', 'Debug']);
            $table->string('location',300)->nullable();
            $table->string('message',300);
            $table->string('attrs',300)->nullable();
            $table->foreign('server_id')->references('id')->on('servers')
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
        Schema::connection('store')->drop('log');
    }
}
