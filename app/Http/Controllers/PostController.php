<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Post;
use App\Author;
use App\Comment;
use App\Http\Requests\CreatePostRequest;

use Exception;
use Pusher;

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

	public function create(CreatePostRequest $request) {

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
		// post recomended
		$postRecomended = Post::whereNotIn('id', [$post->id])
												->limit(3)
												->get();

		// comments
		$comments = Comment::where('post_id', '=', $post->id)
									->orderBy('created_at', 'desc')
									->get();

		// response
		return view('post_detail', [
			'comments' => $comments,
			'post' => $post,
			'post_recommended' => $postRecomended
		]);

	}
 
	public function likes(Request $request, $id) {
		
		$post = Post::find($id);
		$post->likes = $post->likes + 1;

		// save
		try{
			$post->save();
		}
		catch(Exception $e) {
			// logging 
			Log::error($e->getMessage());
			return response()->json([
				'error' => 'Ocurrio un Error'
			], 422);
		}

		$options = array(
	    'cluster' => 'us2',
	    'encrypted' => true
	  );

		// create pusher
		$pusher = new Pusher(
			'f127bb14a529d11fd35b',
			'a81fe89d136ecde24154',
			'354325',
			$options
		);

		// send push notification
		$data['message'] = 'El Post '. $post->title .' ha sumado un like';
		$pusher->trigger('laradium', 'like', $data);

		// response
		return response()->json([
			'post' => $post
		]);
	}

}
