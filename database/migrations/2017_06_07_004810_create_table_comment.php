<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComment extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// comment Schema
		if (!Schema::hasTable('comment')) {
			// create
			Schema::create('comment', function (Blueprint $table) {
				$table->increments('id');
				$table->string('text');
				$table->string('user_name', 50);
				$table->integer('post_id')->unsigned();
			});
			// alter
			Schema::table('comment', function (Blueprint $table) {
				$table->foreign('post_id')
							->references('id')
							->on('post');
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
		Schema::dropIfExists('comment');
	}
}
