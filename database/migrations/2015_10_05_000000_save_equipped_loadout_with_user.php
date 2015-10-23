<?php

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
            $table->dropForeign('eqp_loadout_id');
            $table->dropColumn('eqp_loadout_id');
        });
    }
}
