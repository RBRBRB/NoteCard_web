<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<title>editmodeweb</title>
		<meta name="viewport" content="width=device-width, height=device-height,initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="" >
		<!--<link href="css/editmodeweb.css" rel="StyleSheet" /> -->

		<!-- Add your custom HEAD content here -->
		<!-- has bug
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		-->





	</head>
	<body>
		<div id="content-container" class="haha">
			@include('CardBoard.nav')

			    <div class="jumbotron pre-scrollable">
						<div class="container">
							@include('CardBoard.ShowCard')
						</div>
					</div>
		</div>

	</body>
</html>
