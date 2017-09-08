@extends('layouts.layout')

@section('head')
	@include('head')
@endsection

@section('content')
	<div class="container post-detail-wrapper">

		@if(session('status'))
			<div class="alert alert-success" role="alert">
				{{session('status')}}
			</div>
		@endif

		<!-- User data-->
		<div class="row">
			<div class="col-md-1">
				<img src="https://cdn-images-1.medium.com/fit/c/40/40/	0*WgY9B-Lm4DnCEHlO.jpeg" class="post-author">
			</div>
			<div class="col-md-11 post-author-wrapper">
				<span class="post-author-name">{{$post->author->name}}</span><br>
				<span class="post-date text-muted">{{$post->created_at->diffForHumans()}}</span>
			</div>
		</div>

		<!-- Post data-->

		<div class="row">
			<h1 class="post-detail-title">{{$post->title}}</h1>
		</div>

		<div class="row post-detail-text-wrapper">
			<p class="post-detail-text">{{$post->text}}</p>
		</div>

		<div class="row post-actions">
			<a href="javascript:void(0)" class="like" data-id="{{$post->id}}">
										Like {{$post->likes}}
									</a>
		</div>

	</div>

	<div class="post-recommended-wrapper">
		<div class="container">
			<div>
				@foreach($post_recommended as $post_recommend)
					<div class="col-md-4">
						<div class="post-item">
							<img class="post-item-img" style="background-image: url('https://cdn-images-1.medium.com/max/400/1*SBt2M4m-XtvY4XlBtmYpng.png');">
							<h3 class="post-title">
								<a href="{{URL::route('post_detail', [ 'id' => $post_recommend->id])}}">{{str_limit($post_recommend->title, 20)}}</a>
							</h3>
							<p class="post-description">{{str_limit($post_recommend->text, 100)}}</p>
							<div class="row">
								<div class="col-md-2">
									<img src="https://cdn-images-1.medium.com/fit/c/40/40/	0*WgY9B-Lm4DnCEHlO.jpeg" class="post-author">
								</div>
								<div class="col-md-6 post-author-wrapper">
									<span class="post-author-name">{{$post_recommend->author->name}}</span><br>
									<span class="post-date text-muted">{{$post_recommend->created_at->diffForHumans()}}</span>
								</div>
								<div class="col-md-4">
									<a href="javascript:void(0)" class="like" data-id="{{$post_recommend->id}}">
										Like {{$post_recommend->likes}}
									</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="comments-wrapper">
		<div id="commentSection" class="container comments-content">

			<form action="{{URL::route('comment_create', ['id' => $post->id])}}" method="POST">
				{{csrf_field()}}
				<label>Responses</label>
				<div class="form-group @if($errors->has('user_name')) has-error @endif">
					<input type="text" name="user_name" class="form-control" placeholder="Your name" value="{{old('user_name')}}">
					@if($errors->has('user_name'))
						<span class="help-block">
							@foreach($errors->get('user_name') as $error)
								- {{$error}}
							@endforeach
						</span>
					@endif
				</div>
				<div class="form-group @if($errors->has('text')) has-error @endif">
					<textarea rows="5" name="text" placeholder="Comment" class="form-control">{{old('text')}}</textarea>
					@if($errors->has('text'))
						<span class="help-block">
							@foreach($errors->get('text') as $error)
								- {{$error}}
							@endforeach
						</span>
					@endif
				</div>
				<input type="submit" value="Save" class="btn action-btn">
			</form>
		</div>
	</div>

	<div class="comment-detail-wrapper">
		<div class="container comment-detail-content">
			@foreach($comments as $comment)
				<div class="comment-item">
					<div class="row">
						<div class="col-md-1">
							<img src="https://cdn-images-1.medium.com/fit/c/36/36/1*_FB-MBhCP6dUlQVJalt8Cw.jpeg" class="comment-user">
						</div>
						<div class="col-md-10 comment-user-wrapper">
							<span class="comment-user-name">
								@if($comment->user_name)
									{{$comment->user_name}}
								@else
									Anónimo
								@endif
							</span><br>
							<span class="comment-date text-muted">
								{{$comment->created_at->diffForHumans()}}
							</span>
						</div>
					</div>
					<span></span>
					<p>{{$comment->text}}</p>
				</div>
			@endforeach
		</div>
	</div>
@endsection