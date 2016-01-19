<?php

//Copyright (c) 2015 "Werner Maisl"
//
//This file is part of the Store Webpanel V2.
//
//The Store Webpanel V2 is free software: you can redistribute it and/or modify
//it under the terms of the GNU Affero General Public License as
//published by the Free Software Foundation, either version 3 of the
//License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU Affero General Public License for more details.
//
//You should have received a copy of the GNU Affero General Public License
//along with this program. If not, see <http://www.gnu.org/licenses/>.

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
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('priority')->nullable();
            $table->string('display_name',32);
            $table->string('description',128)->nullable();
			$table->string('require_plugin',32)->nullable();
			$table->string('web_description')->nullable();
			$table->string('web_color',10)->nullable();
            $table->integer('enable_server_restriction')->unsigned()->default(0);
			$table->timestamps();
        });

		// Create table for store items
        Schema::connection('store')->create('items', function (Blueprint $table) {
            $table->engine = "InnoDB";
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
			$table->tinyInteger('is_buyable')->unsigned()->default(1);
			$table->tinyInteger('is_tradeable')->unsigned()->default(1);
			$table->tinyInteger('is_refundable')->unsigned()->default(1);
			$table->integer('expiry_time')->nullable();
			$table->string('flags',11);
            $table->integer('enable_server_restriction')->unsigned()->default(0);
			$table->timestamps();
			
			$table->foreign('category_id')->references('id')->on('categories')
				->onUpdate('cascade')->onDelete('cascade');
        });
		
		// Create table for store loadouts
        Schema::connection('store')->create('loadouts', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
			$table->string('display_name',32);
			$table->string('game',32)->nullable();
			$table->string('class',32)->nullable();
            $table->integer('team')->nullable();
			$table->timestamps();
        });
		
		// Create table for store users
        Schema::connection('store')->create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
			$table->integer('auth')->unique();
			$table->string('name',32);
			$table->integer('credits');
			$table->timestamps();
        });
		
		// Create table for store users items
        Schema::connection('store')->create('users_items', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('item_id')->unsigned()->index();
			$table->dateTime('acquire_date')->nullable();
			$table->enum('acquire_method',['shop', 'trade', 'gift', 'admin', 'web', 'other'])->nullable();
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
				
			$table->foreign('item_id')->references('id')->on('items')
                ->onUpdate('cascade')->onDelete('cascade');
        });
		
		// Create table for store users items loadouts
        Schema::connection('store')->create('users_items_loadouts', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
			$table->integer('useritem_id')->unsigned();
			$table->integer('loadout_id')->unsigned();
			$table->timestamps();
			
			$table->foreign('useritem_id')->references('id')->on('users_items')
                ->onUpdate('cascade')->onDelete('cascade');
				
			$table->foreign('loadout_id')->references('id')->on('loadouts')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // Create table for store servers
        Schema::connection('store')->create('servers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name',32);
            $table->string('display_name',50)->nullable();
            $table->string('ip',15)->nullable();
            $table->string('port',5)->nullable();
            $table->timestamps();
        });

        // Create table for store versions
        Schema::connection('store')->create('versions', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('mod_name',64);
            $table->string('mod_description',64)->nullable();
            $table->string('mod_ver_convar',64)->nullable();
            $table->string('mod_ver_number',64);
            $table->integer('server_id')->unsigned();
            $table->timestamp('last_updated');
            $table->timestamps();

            $table->unique(['mod_ver_convar', 'server_id']);

            $table->foreign('server_id')->references('id')->on('servers')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // Create table for store server items
        Schema::connection('store')->create('servers_items', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('item_id')->unsigned()->index();
            $table->integer('server_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('server_id')->references('id')->on('servers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('item_id')->references('id')->on('items')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // Create table for store server categories
        Schema::connection('store')->create('servers_categories', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('server_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('server_id')->references('id')->on('servers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::connection('store')->drop('users_items_loadouts');
        Schema::connection('store')->drop('loadouts');
        Schema::connection('store')->drop('users_items');
        Schema::connection('store')->drop('servers_items');
        Schema::connection('store')->drop('servers_categories');
        Schema::connection('store')->drop('versions');
        Schema::connection('store')->drop('servers');
        Schema::connection('store')->drop('items');
		Schema::connection('store')->drop('categories');
        Schema::connection('store')->drop('users');
	}

}
