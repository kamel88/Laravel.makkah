@extends('admin.master')

@section('content')

<div class="panel panel-warning">

        <div class="panel-heading" style="font-size:24px">
            أخــــبــــار الجـمـعـيـة
        </div>

        <ul class="list-group">
            @foreach($news as $new)
                <li class="list-group-item">{{ $new->title }}
                    <a href="/admin/news/{{$new->id }}/delete" class="btn btn-danger pull-left">حــذف</a>
                    <a href="/admin/news/{{$new->id }}/edit" class="btn btn-primary pull-left"
                       style="margin: 0 0 0 5px">تعديل</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection