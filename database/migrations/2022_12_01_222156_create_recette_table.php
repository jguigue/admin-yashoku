<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetteTable extends Migration {

	public function up()
	{
		Schema::create('recette', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom', 200);
			$table->string('long_description', 512)->nullable();
			$table->string('short_description', 250)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('recette');
	}
}