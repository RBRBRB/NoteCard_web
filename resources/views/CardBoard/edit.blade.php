@include('CardBoard.fullnav')

<!--  For Summernote  -->
<!-- include libraries(jQuery, bootstrap) -->


<link href="/css/CardBoard/treeview.css" rel="stylesheet">

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<body>


<div class="panel-group">
  <div class="panel panel-primary">
    <div class="panel-heading">Manage Category TreeView</div>
      <div class="panel-body" id="treeBody">
        <div class="row">
          <div class="col-md-6">
            <h3>Category List</h3>
              <ul id="tree1">
                @foreach($crouses as $c_index=>$crouse)
                  <li>
                    {{$crouse->subject}}
                    <?php $chapter_chunk = $chapters->where('subject_id' , $c_index + 1);  ?>
                    <ul>
                      @foreach($chapter_chunk as $chapter)
                        <li class="delegate">
                          {{$chapter->chapter}}
                        </li>
                      @endforeach
                    </ul>
                  </li>
                @endforeach
              </ul>
          </div>
          <div class="col-md-6">
            <h3>Add New Category</h3>
              <div class="form-group">
                <label >Title</label>
                <input type="text" name="title_one" value="" class="title_one form-control" required="required">
                <label >Category</label>

                <select id="createCrouse" class="form-control crouseList" name="">
                  <option selected="selected" value> Select Category or empty</option>
                  @foreach($crouses as $k => $crouse)
                    <option value="{{$k+1}}">{{$crouse->subject}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <button id="addNew" class="btn btn-success">Add New</button>
              </div>
              <div id="addError"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Category List</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading"> Content Add</div>
    <div class="panel-body">
      @include('CardBoard.messages')
      <form method="POST" action="{{ route('summernote.post') }}">
          {{ csrf_field() }}
      	<div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Front:</strong>
              <textarea class="form-control summernote" name="front"></textarea>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Details:</strong>
              <textarea class="form-control summernote" name="detail"></textarea>
          </div>
        </div>
        <input type="hidden" name="pathArg" value="" id="chapterPathSet">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
<script src="/js/CardBoard/treeview.js"></script>
<script type="text/javascript">

    $(document).ready(function() {

     $('.summernote').summernote({
           height: 300,
           //airMode: true,
      });

      var chapterPath_id;

      $("#addNew").on('click' , function(){
        //alert($(".crouseList").val());

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
          '_token':'{{csrf_token()}}',
          url: "{{ route('add.category') }}",
          type: "post",
          //data: $(this).serialize(),

          data: {
            'title': $(".title_one").val(),
            'parent_id': $(".crouseList").val(),
          } ,
          success: function(result){
            //reload categories tree
            //alert(result['success']);
            if(result['success'] == 'success')
            {
              $('#addError').removeClass("alert alert-danger").text("");

              var ul = document.getElementById("tree1");

              var crouse_index = $(".crouseList").val();
              //create Crouse folder
              if(crouse_index == 0)
              {
                //insert crouse
                var optionCnt = $('option').length;

                $("#tree1").append("<li class='branch delegate'>" + $(".title_one").val() + "<ul></ul></li>");
                $("<option value=" + optionCnt + ">" + $(".title_one").val() + "</option>").insertAfter("#createCrouse>option:last-child"); //add value
              }
              else {
                  //insert chapter

                  $crouseIndex = $("#tree1>li:nth-child(" + parseInt(crouse_index)+ ")");

                  if($crouseIndex.find("li").length > 0)
                  {

                    if($crouseIndex.find("li").attr('style') == 'display: none;')
                    {
                      $crouseIndex.find("ul").append("<li class='delegate' style='display: none;'>" + $(".title_one").val() + "</li>");
                    }
                    else {
                      $crouseIndex.find("ul").append("<li class='delegate'>" + $(".title_one").val() + "</li>");
                    }

                  }
                  else {
                    //has bug
                    $crouseIndex.find("ul").append("<li class='delegate' style='display: none;'>" + $(".title_one").val() + "</li>");

                  }
                  $('#tree1').treed();
                  $('#tree1').treed();

              }

            }else if (result['success'] == 'failtitle') {
              $('#addError').addClass("alert alert-danger").removeAttr("style").text("Title Empty").fadeOut(2000);

            }else if (result['success'] == 'failcrouse') {
              $('#addError').addClass("alert alert-danger").removeAttr("style").text("Crouse Duplicate").fadeOut(2000);

            }

            $('.title_one').val('');
        }});

      });

      $("ul>li>ul").delegate('.delegate' ,'click',function(){

        var chapter = $(this).text().trim();
        //get the parent text excluding children text
        var crouse_tmp = $(this).parent().parent().clone().children().remove().end().text();

        var crouse = crouse_tmp.replace(/\s+/g, '');

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
          '_token':'{{csrf_token()}}',
          url: "{{ route('query.category') }}",
          type: "post",
          data:{
            'crouse': crouse,
            'chapter': chapter,
          },
          success: function(result){
            alert(result['success']);
            chapterPath_id = result['success'];

            if($('li.breadcrumb-item').length > 1)
            {
              $('#crousePath').remove();
              $('#chapterPath').remove();
            }

            $('.breadcrumb').append("<li id='crousePath' class='breadcrumb-item' >" + crouse + "</li><li id='chapterPath' class='breadcrumb-item active' >" + chapter + "</li>");
            $('#chapterPathSet').val(chapterPath_id);

          }

        });


      });
      $(".panel-heading").on('click' , function(){
        $('#treeBody').toggle();
      });
   });

</script>
