@extends('layouts.app')

@section('content')

    <br><br><br><br>

    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="../upload/{{$id->picture}}" width="350" height="300">
            </a>
        </div>
        <div class="media-body">
            <a href="/posts/{{$id->id}}"><h4 class="media-heading">{{ $id->title }}</h4></a>
            {{$id->subject}}
        </div>
    </div>
    <br>
@foreach($id->comments as $comment)
    <div class="card bg-light mb-3" style="max-width: 20rem;">
        <div class="card-header">{{$comment->user->name}}</div>
        <div class="card-body">
            <h6 class="card-title">{{$comment->created_at}}</h6>
            <p class="card-text">{{$comment->body}}</p>
        </div>
    </div>
@endforeach
    @if(Auth::user())
    <form method="post" action="{{$id->id}}/comment">
        {{ csrf_field() }}
        <input type="hidden" name="auth" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label for="exampleTextarea">أضف تعليق : </label>
            <textarea class="form-control" name="comment" id="exampleTextarea" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">أضــف</button>
        </div>
    </form>
    @endif
@endsection