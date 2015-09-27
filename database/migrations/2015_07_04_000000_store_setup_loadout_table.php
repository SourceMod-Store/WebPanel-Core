<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreSetupLoadoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create Table that assigns a loadout to a user
        Schema::connection('store')->create('users_loadouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('loadout_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('loadout_id')->references('id')->on('loadouts')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // Add the owner_id and the private column to the loadouts table
        Schema::connection('store')->table('loadouts',function (Blueprint $table) {
            $table->enum('privacy',['public','link','private'])->nullable()->after('team');
            $table->integer('owner_id')->unsigned()->after('privacy');
        });

        // Delete the store_users_items_loadouts table
        Schema::connection('store')->drop('users_items_loadouts');

        // Create the store_items_loadouts table
        Schema::connection('store')->create('items_loadouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->integer('loadout_id')->unsigned();
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('loadout_id')->references('id')->on('loadouts')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // Add the token and ip column to the store users table
        Schema::connection('store')->table('users',function (Blueprint $table) {
            $table->string('token',50)->after('credits')->nullable();
            $table->string('ip',20)->after('token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Delete the store_users_loadouts table
        Schema::connection('store')->drop('users_loadouts');

        //Delete the privacy and owner_id column from the loadouts table
        Schema::connection('store')->table('loadouts',function (Blueprint $table) {
            $table->dropColumn('privacy');
            $table->dropColumn('owner_id');
        });


        // Create the store_users_items_loadouts table
        Schema::connection('store')->create('users_items_loadouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('useritem_id')->unsigned();
            $table->integer('loadout_id')->unsigned();
            $table->timestamps();

            $table->foreign('useritem_id')->references('id')->on('users_items')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('loadout_id')->references('id')->on('loadouts')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        //Delete the store_items_loadouts table
        Schema::connection('store')->drop('items_loadouts');

        //Delete the privacy and owner_id column from the loadouts table
        Schema::connection('store')->table('users',function (Blueprint $table) {
            $table->dropColumn('token');
            $table->dropColumn('ip');
        });
    }
}
