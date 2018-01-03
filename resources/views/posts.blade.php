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

    <div id="onload">
@foreach($id->comments as $comment)
    <div class="card bg-light mb-3" style="max-width: 20rem;">
        <div class="card-header">{{$comment->user->name}}</div>
        <div class="card-body">
            <h6 class="card-title">{{$comment->created_at}}</h6>
            <p class="card-text">{{$comment->body}}</p>
        </div>
    </div>
@endforeach
    </div>

    @if(Auth::user())
    <form id="commentForm">
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{$id->id}}">
        <input type="hidden" id="auth" name="auth" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label for="exampleTextarea">أضف تعليق : </label>
            <textarea class="form-control" name="comment" id="comment" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">أضــف</button>
        </div>
    </form>
    @endif

@section('script')
    <script>
        $(document).ready(function () {
            $('#commentForm').submit(function (e) {
                e.preventDefault();

                var _token = $('input[name=_token]').val();
                var comment = $("#comment").val();
                var id = $("#id").val();
                var auth = $("#auth").val();

                console.log(comment+' '+id+' '+auth);

                $.ajax({
                    type: "POST",
                    url: '/comment',
                    data: {'id':id , '_token':_token ,'comment':comment ,'auth':auth },

                    success: function (data) {
                        var comment = $("#comment").val('');
                        $("#onload").load(location.href + " #onload");
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
@endsection