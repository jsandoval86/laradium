<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	/**
	* table name
	*/
	protected $table = 'author';

	/**
	* post relation
	*/
	public function post()
	{
		return $this->hasMany('App\Post');
	}

}
