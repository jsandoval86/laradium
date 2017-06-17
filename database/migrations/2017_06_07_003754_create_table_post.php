<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// post Schema
		if (!Schema::hasTable('post')) {
			// create
			Schema::create('post', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title', 50);
				$table->text('text');
				$table->integer('likes')->default(0);
				$table->timestamps();
				$table->integer('author_id')->unsigned();
			});
			// altere
			Schema::table('post', function (Blueprint $table) {
				$table->foreign('author_id')
							->references('id')
							->on('author');
			});


		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('post');
	}
}
