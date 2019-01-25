<!DOCTYPE html>
<html>
	<head>
		<title>App name - @yield('title')</title>
	</head>
	<body>
		@include('layouts.partials.navigation')
		
		<div>
			@yield('content')
		</div>
	
	</body>



</html>