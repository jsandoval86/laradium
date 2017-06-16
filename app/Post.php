<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
	* table name
	*/
	protected $table = 'post';

	/**
	* author relation
	*/
	public function author(){
		return $this->belongsTo('App\Author');
	}

}
