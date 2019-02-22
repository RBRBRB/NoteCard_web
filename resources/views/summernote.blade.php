<html lang="en"><!DOCTYPE html>
<html>
<head>
   <meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
</head>
<body>
<div class="container">
<form>
  
<textarea id="summernote"></textarea>
</form>
</div>
<script>$(document).ready(function() {
$("#summernote").summernote({
  placeholder: 'enter directions here...',
        height: 300,
         callbacks: {
        onImageUpload : function(files, editor, welEditable) {

             for(var i = files.length - 1; i >= 0; i--) {
                     sendFile(files[i], this);
            }
        }
    }
    });
});
function sendFile(file, el) {
var form_data = new FormData();
form_data.append('file', file);
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
$.ajax({
    data: {
      form_data,
      '_token':'{{csrf_token()}}'},
    type: "POST",
    url: '{{ route('summernote.post') }}',
    cache: false,
    contentType: false,
    processData: false,
    success: function(url) {
        $(el).summernote('editor.insertImage', url);
    }
});
}
</script>
</body>
</html>
