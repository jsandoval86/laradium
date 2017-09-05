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

			<form action="{{URL::route('post_create')}}" method="POST">
				{{csrf_field()}}
				<div class="form-group @if($errors->has('author_name')) has-error @endif">
						<input type="text" name="author_name" class="form-control post-write-author" placeholder="Your name" value="{{old('author_name')}}" autocomplete="off" autofocus>
						@if($errors->has('author_name'))
							<span class="help-block">
								@foreach($errors->get('author_name') as $error)
									- {{$error}} <br>
								@endforeach
							</span>
						@endif
				</div>

				<div class="form-group @if($errors->has('title')) has-error @endif">
					<input type="text" name="title" class="form-control post-write-title" placeholder="Titulo" value="{{old('title')}}" autocomplete="off">
					@if($errors->has('title'))
						<span class="help-block">
							@foreach($errors->get('title') as $error)
								- {{$error}}<br>
							@endforeach
						</span>
					@endif
				</div>

				<div class="form-group @if($errors->has('text')) has-error @endif">
					<textarea rows="8" name="text" class="form-control post-write-text" placeholder="Tell your story...">{{old('text')}}</textarea>
					@if($errors->has('text'))
						<span class="help-block">
							@foreach($errors->get('text') as $error)
								- {{$error}}<br>
							@endforeach
						</span>
					@endif
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