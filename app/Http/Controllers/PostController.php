<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Post;
use App\Author;
use Exception;

class PostController extends Controller
{

	public function listView()
	{

		// query post
		$posts = Post::all();

		// response
		return view('post_list', [
			'posts' => $posts
		]);
	}

	public function createView() {

		// response
		return view('post_create');
	}

	public function create(Request $request) {


		// validate data
		$this->validate($request, [
			'author_name' => 'required',
			'title' => 'required',
			'text' => 'required'
		]);

		// create author
		$author = $this->createAuthor($request);
		if (is_null($author)) {
			return back()->with('status', 'Ocurrio mientras se guardaba');
		}

		// create post
		$post = new Post();
		$post->title = $request->input('title');
		$post->text = $request->input('text');
		$post->author_id = $author->id;

		try{
			$post->save();
		}
		catch(Exception $e) {
			// logging
			Log::error($e->getMessage());
			return back()
							->with('status', 'Ocurrio un error mientras guardaba!');
		}


		// response
		return redirect()
						->route('post_detail', ['id' => $post->id])
						->with('status', 'Post creado!');
	}

	private function createAuthor(Request $request) {

		// create author
		$author = new Author();
		$author->name = $request->input('author_name');

		try {
			$author->save();
		}
		catch(Exception $e) {
			// logging
			Log::error($e->getMessage());
			return null;
		}

		return $author;

	}

	public function detailView(Request $request, $id) {

		// find post
		$post = Post::find($id);
		// response
		return $post;
	}

}
