<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Exception;
use App\Helper\StatusCodes;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{

	private $ERR_MSG_SAVE = 'Ocurrio un error mientras se guardaba';


	public function createView(Request $request) {
		$hola = ['h', 'o', 'l', 'a'];
		return view('author_create', [
			'quemas' => $hola
		]);
	}


		/**
		 * create author
		 * @param Request $request
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function create(Request $request) {

		// validate data
		$this->validateToCreate($request);

		// create author
		$author = new Author();
		$author->name = $request->input('name');

		// save
		try {
			$author->save();
		}catch(Exception $e) {
			// logging
			Log::error($e->getMessage());
			// response
			return response()->json([
				'error' => $this->ERR_MSG_SAVE
			], StatusCodes::HTTP_422);
		}

		// response
		return response()->json([
			'author' => $author
		]);
	}

		/**
		 * validate to create author
		 * @param $request
		 */
	private function validateToCreate($request) {
		// validation rules
		$this->validate($request, [
			'name' => 'required'
		]);
	}

		/**
		 * response detail author
		 * @param Request $request
		 * @param $id
		 * @return \Illuminate\Http\JsonResponse
		 */
	public function detail(Request $request, $id) {

		// get author
		$author = Author::find($id);

		//response
		return response()->json([
			'author' => $author
		]);
	}
}
