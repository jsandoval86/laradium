<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Author extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// create author anonymos default
		DB::table('author')->insert([
			'name' => 'Anónimo'
		]);
	}
}
