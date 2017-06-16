<!DOCTYPE html>
<html>
<head>
	<title>Escribe una historia</title>
	@include('head')
</head>
<body>
	<div class="container post-write-wrapper">
		<div class="row post-write-content">

			@if(session('status'))
				<div class="alert alert-danger" role="alert">
					{{session('status')}}
				</div>
			@endif

			@if(count($errors) > 0)
				<div class="alert alert-danger" role="alert">
					@foreach($errors->all() as $error)
						- {{$error}} <br>
					@endforeach
				</div>
			@endif

			<form action="{{URL::route('post_create')}}" method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<input type="text" name="author_name" class="form-control post-write-author" placeholder="Your name" value="{{old('author_name')}}" autocomplete="off" autofocus>
				</div>

				<div class="form-group">
					<input type="text" name="title" class="form-control post-write-title" placeholder="Titulo" value="{{old('title')}}" autocomplete="off">
				</div>

				<div class="form-group">
					<textarea rows="8" name="text" class="form-control post-write-text" placeholder="Tell your story...">{{old('text')}}</textarea>
				</div>

				<input type="submit" value="Save" class="btn action-btn">
			</form>
		</div>

		<div class="row">
			<p class="text-muted helper-text">select text to change formatting, add headers, or create links.</p>
		</div>

		<div class="row center">
			<p>Espacio para los controles</p>
		</div>

	</div>
</body>
</html>