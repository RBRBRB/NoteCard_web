<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Laravel Category Treeview Example</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
  </script>

    <link href="/css/treeview.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">Manage Category TreeView</div>
	  		<div class="panel-body">
	  			<div class="row">
	  				<div class="col-md-6">
	  					<h3>Category List</h3>
				        <ul id="tree1">
				            @foreach($categories as $category)
				                <li>
				                    {{ $category->title }}
				                    @if(count($category->childs))
				                        @include('manageChild',['childs' => $category->childs])
				                    @endif
				                </li>
				            @endforeach
				        </ul>
	  				</div>
	  				<div class="col-md-6">
	  					<h3>Add New Category</h3>

                <div class="form-group">
                  <label >Title</label>
                  <input type="text" name="title_one" value="" class="title_one form-control">
                  <label >Category</label>

                  <select id="createCrouse" class="form-control crouseList" name="">
                    <option selected="selected" value>Select Category or empty</option>
                    @foreach($categories as $k => $category)
                      <option>{{$category->title}}</option> <!-- add value-->
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
									<button class="btn btn-success">Add New</button>
								</div>

	  				</div>
	  			</div>



	  		</div>
        </div>

    </div>
    <script src="/js/treeview.js"></script>
    <script type="text/javascript">

        $("button").on('click' , function(){
          alert($(".crouseList").val());
          $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
          $.ajax({
            '_token':'{{csrf_token()}}',
            url: "{{ route('add.category') }}",
            type: "post",
            //data: $(this).serialize(),

            data: {          //$(this).serialize(),
              'title': $(".title_one").val(),
              'parent_id': $(".crouseList").val(),
            } ,
            success: function(result){
              //reload categories tree
              alert(result['success']);
              var ul = document.getElementById("tree1");

              var crouse_index = $(".crouseList").val();

              if(crouse_index == 0)
              {
                //insert crouse
                var optionCnt = $('option').length;
                alert("optionCnt: "+optionCnt);
                $("#tree1").append("<li>" + $(".title_one").val() + "</li>");
                $("<option>" + $(".title_one").val() + "</option>").insertAfter("#createCrouse>option:last-child"); //add value
              }
              else {
                  //insert chapter

                  $crouseIndex = $("#tree1>li:nth-child(" + parseInt(crouse_index)+ ")");

                  if($crouseIndex.find("ul").length > 0)
                  {

                    if($crouseIndex.find("li").attr('style') == 'display: none;')
                    {
                      $crouseIndex.find("ul").append("<li style='display: none;'>" + $(".title_one").val() + "</li>");
                    }
                    else {
                      $crouseIndex.find("ul").append("<li>" + $(".title_one").val() + "</li>");
                    }

                  }
                  else {

                    $crouseIndex.append("<ul><li style='display: none;'>" + $(".title_one").val() + "</li></ul>"); //has bug

                  }
                  $('#tree1').treed();
                  $('#tree1').treed();

              }


          }});

        });

    </script>
</body>
</html>
