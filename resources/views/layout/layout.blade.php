<!DOCTYPE html>
<html>
<head>
	<title>Laradium</title>
	@yield('head')
	<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
	<script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container right">
			<a href="{{URL::route('post_create_view')}}" class="btn action-btn">
				Write
			</a>
		</div>
	</nav>
	<div class="content-view">
		@yield('content')
	</div>
</body>
</html>