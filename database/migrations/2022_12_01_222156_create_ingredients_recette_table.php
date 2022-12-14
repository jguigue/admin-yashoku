<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsRecetteTable extends Migration {

	public function up()
	{
		Schema::create('ingredients_recette', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('quantite')->nullable();
			$table->integer('quantite_ingredients');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ingredients_recette');
	}
}