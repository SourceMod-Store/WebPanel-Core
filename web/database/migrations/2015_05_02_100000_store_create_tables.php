<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreCreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create table for store categories
        Schema::connection('store')->create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('priority')->nullable();
            $table->string('display_name',32);
            $table->string('description',128)->nullable();
			$table->string('require_plugin',32)->nullable();
			$table->string('web_description')->nullable();
			$table->string('web_color',10)->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

		// Create table for store items
        Schema::connection('store')->create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('priority')->nullable();
			$table->string('name',32)->unique();
            $table->string('display_name',32);
            $table->string('description',128)->nullable();
			$table->string('web_description')->nullable();
			$table->string('type',32);
			$table->string('loadout_slot',32)->nullable();
			$table->integer('price');
			$table->integer('category_id')->unsigned();
			$table->string('attrs')->nullable();
			$table->tinyInteger('is_buyable');
			$table->tinyInteger('is_tradeable');
			$table->tinyInteger('is_refundable');
			$table->integer('expiry_time');
			$table->string('flags',11);
			$table->timestamps();
			$table->softDeletes();
			
			$table->foreign('category_id')->references('id')->on('categories')
				->onUpdate('cascade')->onDelete('cascade');
        });
		
		// Create table for store loadouts
        Schema::connection('store')->create('loadouts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('display_name',32);
			$table->string('game',32)->nullable();
			$table->string('class',32)->nullable();
            $table->integer('team')->nullable();
			$table->timestamps();
			$table->softDeletes();
        });
		
		// Create table for store users
        Schema::connection('store')->create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('auth')->unique();
			$table->string('name',32);
			$table->integer('credits');
			$table->timestamps();
			$table->softDeletes();
        });
		
		// Create table for store users items
        Schema::connection('store')->create('users_items', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('item_id')->unsigned();
			$table->dateTime('acquire_date')->nullable();
			$table->enum('acquire_method',['shop', 'trade', 'gift', 'admin', 'web', 'other'])->nullable();
			$table->timestamps();
			$table->softDeletes();
			
			$table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
				
			$table->foreign('item_id')->references('id')->on('items')
                ->onUpdate('cascade')->onDelete('cascade');
        });
		
		// Create table for store users items loadouts
        Schema::connection('store')->create('users_items_loadouts', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('useritem_id')->unsigned();
			$table->integer('loadout_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			
			$table->foreign('useritem_id')->references('id')->on('users_items')
                ->onUpdate('cascade')->onDelete('cascade');
				
			$table->foreign('loadout_id')->references('id')->on('loadouts')
                ->onUpdate('cascade')->onDelete('cascade');
        });
		
		// Create table for store versions
        Schema::connection('store')->create('versions', function (Blueprint $table) {
            $table->increments('id');
			$table->string('mod_name',64);
			$table->string('mod_description',64)->nullable();
			$table->string('mod_ver_convar',64)->nullable();
			$table->string('mod_ver_number',64);
			$table->string('server_id',64);
			$table->timestamp('last_updated');
			$table->timestamps();
			$table->softDeletes();
			
			$table->unique(['mod_ver_convar', 'server_id']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('store')->drop('categories');
        Schema::connection('store')->drop('items');
        Schema::connection('store')->drop('users');
        Schema::connection('store')->drop('users_items');
		Schema::connection('store')->drop('users_items_loadouts');
		Schema::connection('store')->drop('versions');
	}

}
