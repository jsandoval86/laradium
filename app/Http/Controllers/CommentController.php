<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Comment;

use Exception;
use Validator;

class CommentController extends Controller
{

	/**
	* create comment from Post
	* @param Request $request
	* @param int $id
	*/
	public function create(Request $request, $id)
	{

		// validate data
		$this->validateToCreate($request);

		// create comment
		$comment = new Comment();
		$comment->text = $request->input('text');
		$comment->user_name = $request->input('user_name');
		$comment->post_id = $id;

		// save comment
		try{
			$comment->save();
		}catch(Exception $e) {
			// logging exception
			Log::error($e->getMessage());
			// response
			return back()
							->with('status_comment', 'Ocurrio un error mientras se guardaba el comentario');
		}

		// redirect
		return redirect()
						->route('post_detail', [ 'id' => $id, '#commentSection'])
						->with('status_comment', 'Comentario guardado!');
	}

	/**
	* validation create comment post
	* @param Request $request
	*/
	private function validateToCreate(Request $request) {

		// implement validator Facade
		$validator = Validator::make($request->all(), [
			'text' => 'required',
			'user_name' => 'bail|nullable'
		]);

		// response
		if ($validator->fails()) {
			return back()
				->withErrors($validator)
				->withInput();
		}

	}

}
