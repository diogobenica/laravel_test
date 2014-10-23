<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaIngredientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pizza_ingredients', function($table)
    {
        $table->increments('id');
        $table->integer('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
        $table->integer('ingredient_id')->references('id')->on('ingredients');
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
		Schema::drop('pizza_ingredients');
	}

}
