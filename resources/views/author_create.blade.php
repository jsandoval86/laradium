@extends('layout')

@section('content')
	<h4>Crear autor</h4>

	@if(count($errors) > 0 )
	<div>
		@foreach ($errors->all() as $error)
			<span>- {{ $error }} </span> <br>
		@endforeach
	</div>
@endif
	<form action="{{URL::route('author_create')}}" method="POST">
		{{csrf_field()}}
		<label for="name">Nombre:</label>
		<input type="text" name="name">
		<input type="submit" value="Guardar">
	</form>
@endsection
