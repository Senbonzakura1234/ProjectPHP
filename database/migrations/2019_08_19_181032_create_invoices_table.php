<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->bigInteger('user_id');
	        $table->double("total");
	        $table->string("city");
	        $table->string("state");
	        $table->string("zip");
	        $table->string("bAddress1");
	        $table->string("bAddress2")->nullable();
	        $table->string("country_id");
	        $table->string("phone");
	        $table->timestamp("buy_at")->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
