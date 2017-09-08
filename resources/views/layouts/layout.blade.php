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
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::guest())
					<li>
						<a href="{{URL::route('post_create_view')}}" class="btn action-btn">
						Write
						</a>
					</li>
					<li>
						<a href="{{URL::route('login')}}" class="btn btn-link">Log in</a>
					</li>
				@else
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									{{ Auth::user()->name }} <span class="caret"></span>
						</a>
					</li>
					<li>
						<a href="{{URL::route('logout')}}">Log out</a>
					</li>
				@endif
			</ul>
		</div>
	</nav>
	<div class="content-view">
		@yield('content')
	</div>
</body>
</html>