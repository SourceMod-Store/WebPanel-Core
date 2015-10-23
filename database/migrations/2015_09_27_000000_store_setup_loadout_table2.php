<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreSetupLoadoutTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the owner_id as foreign key
        Schema::connection('store')->table('loadouts',function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('users')
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
        Schema::connection('store')->table('loadouts',function (Blueprint $table) {
            $table->dropForeign('owner_id');
        });
    }
}
