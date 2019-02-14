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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" />
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	  <link rel="stylesheet" href="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/navbar-fixed-right.min.css">
	  <link rel="stylesheet" href="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/navbar-fixed-left.min.css">
	  <link rel="stylesheet" href="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/docs.css">

    <link rel="stylesheet" href="{{asset('css/CardBoard/HomePage.css')}}">
		<link rel="stylesheet" href="{{asset('css/CardBoard/CardGrouping.css')}}">
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script src="js/CardBoard/docs.js"></script>
	  <script src="js/CardBoard/Animation.js"></script>
	  <script async defer src="https://buttons.github.io/buttons.js"></script>



	</head>
	<body>
		<div id="content-container" >
			<div id="noSelect" class="navbar-header navbar-fixed-left">
		        <a class="navbar-brand" href="#" >
						</a>
		  </div>
			<nav class="navbar navbar-inverse navbar-fixed-right showNav-r">

		      <div id="select" class="navbar-header">

		        <a class="navbar-brand" href="#" >
							<div class="bar arrow-top-l"></div>
							<div class="bar arrow-middle-l"></div>
							<div class="bar arrow-bottom-l"></div>
						</a>

		      </div>
		      <div id="navbar" class="navbar-collapse">
		        <ul class="nav navbar-nav ">
		          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
		          <li><a href="#"><i class="fa fa-leanpub"></i> Review</a></li>
		          <li><a href="#"><i class="fa fa-plus"></i> Edit</a></li>
		          <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		            <ul class="dropdown-menu">
		              <li><a href="#">Action</a></li>
		              <li><a href="#">Another action</a></li>

		              <li role="separator" class="divider"></li>
		              <li class="dropdown-header">Nav header</li>
		              <li><a href="#">Separated link</a></li>

		            </ul>
		          </li>
		        </ul>
		        <ul class="nav navbar-nav navbar-left">
		          <li>
		            <a data-class="navbar-fixed-left">
		              <i class="fa fa-arrow-left"></i>
		              Fixed Left
		            </a>
		          </li>
		          <li>
		            <a data-class="navbar-fixed-right">
		              <i class="fa fa-arrow-right"></i>
		              Fixed Right
		            </a>
		          </li>
		        </ul>
		      </div>

		  </nav>


			    <div class="jumbotron">
						<div class="container">
							@include('CardBoard.ShowCard')
						</div>
					</div>
				</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>
