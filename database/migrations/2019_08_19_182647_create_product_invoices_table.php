<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->bigInteger('user_id');
	        $table->bigInteger('invoice_id');
	        $table->bigInteger('post_id')->nullable();
	        $table->bigInteger('dlc_id')->nullable();
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
        Schema::dropIfExists('product_invoices');
    }
}
