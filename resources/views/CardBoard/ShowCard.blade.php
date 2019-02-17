<?php
use App\Crouse;
use App\Chapter;
$crouses = Crouse::all();

$chapters = Chapter::all();


?>
  <!-- path display
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Library</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
  </nav>-->
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
                <div class="card ">
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
              <div class="card ">Card</div>
          </li>
        </ol>
    </li>
  </ol>
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
