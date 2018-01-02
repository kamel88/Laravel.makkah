@extends('admin.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>أخبار الجمعية</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">

                    @if(count($errors))
                        <div class="alert alert-danger ">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="myForm" method="post" action="/admin/newsstore" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <div class="form-group">
                            <h3><label>عنوان الخبر</label></h3>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control"
                                   placeholder="اضف عنوان للخبر"/>
                        </div>

                        <div class="form-group">
                            <h3><label>كتابة الخبر</label></h3>
                            <textarea name="subject" class="form-control" placeholder="اكتب الخبر ....."
                                      rows="5">{{old('subject')}}</textarea>
                        </div>

                        <div class="form-group">
                            <h3><label>اضف صورة</label></h3>
                            <input type="file" name="picture"/>
                        </div>
                        <div class="form-group">
                            <button id="btnAdd" type="submit" class="btn btn-primary btn-md">حـفـظ الخـبـر</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        (function ($) {
            // $("#myForm").submit(function(){
            //      alert('submit my form ');
            // });
            // Initializing ///
            $(document).ready(function () {
                mainApp.main_fun();
            });
        }(jQuery));
    </script>
@endsection