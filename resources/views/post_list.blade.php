@extends('layout.layout')

@section('content')
	<div class="container">
		
	<div class="row">
		@foreach($posts as $post)
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="{{URL::asset('/img/default-thu.jpg')}}" >
					<div class="caption">
						<h3>{{$post->title}}</h3>
						<p>{{$post->text}}</p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection