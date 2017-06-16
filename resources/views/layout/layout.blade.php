<!DOCTYPE html>
<html>
<head>
	<title>Laradium</title>
	@yield('head')
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