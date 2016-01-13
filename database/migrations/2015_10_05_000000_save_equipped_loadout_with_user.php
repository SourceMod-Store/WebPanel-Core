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

class SaveEquippedLoadoutWithUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the owner_id as foreign key
        Schema::connection('store')->table('users',function (Blueprint $table) {
            $table->integer('eqp_loadout_id')->unsigned()->nullable()->after('credits');
            $table->foreign('eqp_loadout_id')->references('id')->on('loadouts')
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
        //Remove the owner id as foreign key
        Schema::connection('store')->table('users',function (Blueprint $table) {
            $table->dropForeign('users_eqp_loadout_id_foreign');
            $table->dropColumn('eqp_loadout_id');
        });
    }
}
