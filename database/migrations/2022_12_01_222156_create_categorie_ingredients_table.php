<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieIngredientsTable extends Migration {

	public function up()
	{
		Schema::create('categorie_ingredients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom_categorie', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categorie_ingredients');
	}
}