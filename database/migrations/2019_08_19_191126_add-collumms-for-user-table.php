<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollummsForUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('users', function ($table) {
		    $table->bigInteger('country_id');
		    $table->string('avatar')->nullable()->nullable();
		    $table->string('cover')->nullable()->nullable();
		    $table->string('desc')->nullable()->nullable();
		    $table->string('firstName')->nullable();
		    $table->string('lastName')->nullable();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
