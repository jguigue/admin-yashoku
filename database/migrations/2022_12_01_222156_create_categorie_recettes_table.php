<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieRecettesTable extends Migration {

	public function up()
	{
		Schema::create('categorie_recettes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom_categorie', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categorie_recettes');
	}
}