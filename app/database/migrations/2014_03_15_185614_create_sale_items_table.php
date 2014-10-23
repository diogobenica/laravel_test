<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_items', function($table)
    {
        $table->increments('id');
        $table->integer('sale_id')->references('id')->on('sales')->onDelete('cascade');
        $table->integer('pizza_id')->references('id')->on('pizzas');
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
		Schema::drop('sales_items');
	}

}
