  <ol>
    <li>
      <!-- Fisrt Layer Subject Card Group Example
      <div class="card card--group">Card Group1</div>
      -->
      @if(count($crouses) > 1)
        @foreach($crouses as $index_x=>$crouse)

          <div class="card card--group">
            {{$crouse->subject}}
          </div>
            <ol>
              <?php $chapter_chunk = $chapters->where('subject_id' , $index_x + 1);  ?>

              @foreach($chapter_chunk as $chapter)
              <li>
                <div class="card chapterCard" value="{{$chapter->chapter_id}}">
                  {{$chapter->chapter}}
                </div>
              </li>
              @endforeach
            </ol>
        @endforeach

      @else
        <p>No Crouse Now!</p>
      @endif
      <div class="card card--group">Card Group1</div>
        <ol>
          <li>
              <div class="card ">

              </div>
          </li>
        </ol>
    </li>
  </ol>
  <form id="reviewContent" class="" action="{{ route('review.content') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="pathArg" value="" id="chapterPathSet">
  </form>



<script type="text/javascript">
  $(".chapterCard").on('click' , function(){
    //alert($(this).attr('value'));
    $('#chapterPathSet').val($(this).attr('value'));
    //alert("ready to send chapter id");
		document.getElementById("reviewContent").submit();

  });


</script>
<script src="{{asset('js/CardBoard/CardGroup.js')}}"></script>
  <!--
  <ol>
    <li>
      <div class="card card--group">Card group </div>

      <ol>

        <li>
          <div class="card card--group">Card group </div>

      <ol>

        <li>
          <div class="card ">Card</div>
        </li>
        <li>
          <div class="card">Card</div>
        </li>
        <li>
          <div class="card">Card</div>
        </li>

      </ol>
        </li>
        <li>
          <div class="card">Card</div>
        </li>
        <li>
          <div class="card">Card</div>
        </li>

      </ol>
    </li>

      <div class="card card--group">Card group </div>
      <ol>

        <li>
          <div class="card is-loading">Loading card...</div>
        </li>
        <li>
          <div class="card is-loading">Loading card...</div>
        </li>
        <li>
          <div class="card is-loading">Loading card...</div>
        </li>

      </ol>
     <li><div class="card is-loading">Loading card...</div></li>
     <li><div class="card is-loading">Loading card...</div></li>
     <li><div class="card is-loading">Loading card...</div></li>
  </ol>
-->
