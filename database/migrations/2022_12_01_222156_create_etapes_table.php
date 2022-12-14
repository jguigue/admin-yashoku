<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapesTable extends Migration {

	public function up()
	{
		Schema::create('etapes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('numero');
			$table->string('description', 1028);
		});
	}

	public function down()
	{
		Schema::drop('etapes');
	}
}