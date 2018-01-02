
@extends('layouts.app')

@section('content')

<br><br><br><br>

@foreach($news as $new)
    <div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="upload/{{$new->picture}}"  width="150" height="150">
    </a>
  </div>
  <div class="media-body">
    <a href="/posts/{{$new->id}}"><h4 class="media-heading">{{ $new->title }}</h4></a>
    {{$new->subject}}
  </div>
</div>
<br>
@endforeach
@endsection