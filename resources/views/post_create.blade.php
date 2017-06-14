@extends('layout.layout')

@section('content')
	<div class="container">
		<div class="row">

			@if(session('status'))
				<div class="alert alert-danger" role="alert">
					{{session('status ')}}
				</div>
			@endif

			@if(count($errors) > 0)
				<div class="alert alert-danger" role="alert">
					@foreach($errors->all() as $error)
						- {{$error}} <br>
					@endforeach
				</div>
			@endif

			<p class="text-muted helper-text">Cuentanos tu Historia!</p>

			<form action="{{URL::route('post_create')}}" method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<label>Autor</label>
					<input type="text" name="author_name" class="form-control" placeholder="Tu nombre" value="{{old('author_name')}}">
				</div>

				<div class="form-group">
					<label>Titulo</label>
					<input type="text" name="title" class="form-control" placeholder="Titulo" value="{{old('title')}}">
				</div>

				<div class="form-group">
					<label>Texto</label>
					<textarea rows="8" name="text" class="form-control">{{old('title', 'Cuentanos tu historia...')}}</textarea>
				</div>

				<input type="submit" value="Guardar" class="btn btn-success">
			</form>
		</div>

		<div class="row">
			<p class="text-muted helper-text">select text to change formatting, add headers, or create links.</p>
		</div>

		<div class="row center">
			<p>Espacio para los controles</p>
		</div>

	</div>
@endsection