<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" />
@include('CardBoard.messages')
<form method="post" action="{{url('/CardBoard')}}" enctype="multipart/form-data">
    {{ csrf_field() }}


    <div class="form-group">

        <textarea id="article-ckeditor" class="form-control" name="addPost" rows="8" cols="80" ></textarea>
    </div>
    ...
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.ckeditor.com/4.11.2/standard-all/ckeditor.js"></script>
    <script>

        CKEDITOR.replace( 'article-ckeditor', {
            extraPlugins: 'easyimage',
            removePlugins: 'image',
            //cloudServices_tokenUrl: 'https://example.com/cs-token-endpoint',
            //cloudServices_uploadUrl: 'https://your-organization-id.cke-cs.com/easyimage/upload/'
        } );
    </script>

<!--
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#article-ckeditor' ) ,{
              cloudServices: {
                  tokenUrl: 'https://example.com/cs-token-endpoint',
                  uploadUrl: 'https://your-organization-id.cke-cs.com/easyimage/upload/'
              }


            })
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
-->
