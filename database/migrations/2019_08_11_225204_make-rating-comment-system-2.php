<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeRatingCommentSystem2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('comments', function($table) {
		    $table->dropColumn('name');
		    $table->dropColumn('email');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('comments', function($table) {
		    $table->integer('name');
		    $table->integer('email');
	    });
    }
}
