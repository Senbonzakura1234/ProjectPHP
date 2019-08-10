<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDlcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlcs', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->bigInteger('post_id');
	        $table->string('cover');
	        $table->string('title');
	        $table->text('content');
	        $table->double("price");
	        $table->timestamp("deleted_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dlcs');
    }
}
