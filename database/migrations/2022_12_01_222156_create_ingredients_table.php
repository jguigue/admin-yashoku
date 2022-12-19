<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration {

	public function up()
	{
		Schema::create('ingredients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom_ingredient', 200);
			$table->string('type_quantite', 50);
            $table->foreignId('categorie_id')->on('categorie_ingredients')->onDelete('cascade');
			$table->string('image', 255)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ingredients');
	}
}