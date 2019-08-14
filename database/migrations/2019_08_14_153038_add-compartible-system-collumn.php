<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompartibleSystemCollumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('dlcs', function ($table) {
		    $table->integer('windows');
		    $table->integer('xbox');
		    $table->integer('playstation');
	    });
	    Schema::table('posts', function ($table) {
		    $table->integer('windows');
		    $table->integer('xbox');
		    $table->integer('playstation');
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
