<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" />
@include('CardBoard.messages')
<form method="post" action="{{url('/CardBoard')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="fname">Text</label>
    <input type="text" id="fname" name="fname">

    <div class="form-group">
        <label for="author">Cover:</label>
        <input type="file" class="form-control" name="bookcover"/>
    </div>
    ...
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
