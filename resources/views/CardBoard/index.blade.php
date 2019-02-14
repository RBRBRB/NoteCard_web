@section('content')
  <h1>Posts</h1>
  @if(count($crouses) > 1)
    @foreach($crouses as $crouse)
      <div class="well">
        <h3>{{$crouse->subject}}</h3>
        <small>Written on{{$crouse->created_at}}</small>
      </div>

    @endforeach

  @else
    <p>No Crouse Now!</p>
  @endif
@endsection

@yield('content')
