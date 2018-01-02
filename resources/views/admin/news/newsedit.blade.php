@extends('admin.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>تعديل على الخبر</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <form method="post" action="/admin/news/{{$id->id}}/update" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h3><label>عنوان الخبر</label></h3>
                            <input name="title" class="form-control" value="{{$id->title}}"/>
                        </div>

                        <div class="form-group">
                            <h3><label>الخبر</label></h3>
                            <textarea name="subject" class="form-control" rows="5">{{$id->subject}}</textarea>
                        </div>
                        <div class="form-group">
                            <img src="../../../upload/{{$id->picture}}" width="200" height="200" alt="picture">
                        </div>
                        <div class="form-group">
                            <h3><label>تعديل الصورة</label></h3>
                            <input type="file" name="picture">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md">تـعـديــل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection