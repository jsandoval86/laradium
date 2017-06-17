@extends('layout.layout')

@section('head')
	@include('head')
@endsection

@section('content')
	<div class="welcome-wrapper">
		<div class="container center welcome-title">
			<h1 id="titleApp">Welcome to Laradium</h1>
			<h2>Tell your Story! </h2>
		</div>
	</div>

	<div class="post-wrapper">
		<div class="container">
				@foreach($posts as $post)
				<div class="col-md-4">
					<div class="post-item">
						<img class="post-item-img" style="background-image: url('https://cdn-images-1.medium.com/max/400/1*SBt2M4m-XtvY4XlBtmYpng.png');">
						<h3 class="post-title">
							<a href="{{URL::route('post_detail', [ 'id' => $post->id])}}">{{str_limit($post->title, 20)}}</a>
						</h3>
						<p class="post-description">{{str_limit($post->text, 100)}}</p>
						<div class="row">
							<div class="col-md-2">
								<img src="https://cdn-images-1.medium.com/fit/c/40/40/	0*WgY9B-Lm4DnCEHlO.jpeg" class="post-author">
							</div>
							<div class="col-md-10 post-author-wrapper">
								<span class="post-author-name">{{$post->author->name}}</span><br>
								<span class="post-date text-muted">{{$post->created_at->diffForHumans()}}</span>
							</div>
						</div>
					</div>
				</div>
				@endforeach
		</div>
	</div>
@endsection