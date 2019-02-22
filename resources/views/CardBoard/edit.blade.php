@include('CardBoard.nav')

<!--  For Summernote  -->
<!-- include libraries(jQuery, bootstrap) -->




<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>



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
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

<script type="text/javascript">

    $(document).ready(function() {
     $('.summernote').summernote({
           height: 300,
           //airMode: true,
      });
   });

</script>
