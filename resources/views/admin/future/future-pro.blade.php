@extends('admin.master')

@section('content')

    <div>
        <p class="bg-info lead" style="text-align: center">
            <a id="clickAdd" data-toggle="modal" data-target="#modalFut"><i class="fa fa-plus-circle fa-2x pull-left"
                                                                            aria-hidden="true"
                                                                            style="margin: 0 0 15px 15px ; color: #0d3625 "></i></a>
            المشاريع المستقبلية</p>
    </div>

    <div class="panel-body">
        <ul class="list-group" id="items">
            @foreach($future as $fut)
                <li class="list-group-item ourItem" data-toggle="modal" data-target="#modalFut">
                    {{$fut->title }}
                    <input type="hidden" id="itemId" value="{{$fut->id}}">
                </li>
            @endforeach
        </ul>
    </div>

    <div id="modalFut" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 id="modalTitle" class="modal-title">أضف مشروع جديد</h4>
                </div>
                <form id="myForm">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="id" name="id">

                        <input type="hidden" id="picH">
                        <div class="form-group">
                            <label>عنوان المشروع</label>
                            <input id="title" name="title" type="text" class="form-control"
                                   placeholder="اضف عنوانا للمشروع ....">
                        </div>

                        <div class="form-group">
                            <label>كتابة المشروع</label>
                            <textarea id="subject" name="subject" rows="4" class="form-control"
                                      placeholder="اضف المشروع ......"></textarea>
                        </div>

                        <div id="testUpdate" class="form-group">
                            <img id="imgUp" name="pictureUp" style="display: none" width="160" height="120" alt="picture">
                        </div>

                        <div class="form-group">
                            <label>اضف صورة</label>
                            <input id="picture" name="picture" type="file" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button id="btnDel" type="button" class="btn btn-danger" data-dismiss="modal" style="display: none">حــذف</button>

                        <button id="btnUp" type="submit" class="btn btn-warning"style="display: none">حفظ التغييرات</button>

                        <button id="btnAdd" type="submit" class="btn btn-primary">إضـافـة</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('script')
    <script type="text/javascript">
        (function ($) {
            /////////////////////Update Event
            $("#btnUp").click( function (e) {
                $("#myForm").ajaxForm({
                    url: 'updatefut',
                    type: 'POST',
                    complete: function (response) {
                        if ($.isEmptyObject(response.responseJSON.error))
                        {
                         //   $("#modalFut").fadeOut(100);
                            $("#items").load(location.href + (' #items'));
                            console.log(response);
                        }
                        else
                        {
                            printErrorMsg(response.responseJSON.error);
                           // $("#modalFut").fadeOut(100);
                            $("#items").load(location.href + (' #items'));
                            console.log(response);
                        }
                    }
                });
            });
            ///////////////////////////Add Event
            $("#btnAdd").click(function (event) {
                $("#myForm").ajaxForm({
                    url: 'projectfut',
                    type: 'POST',

                    complete: function (response) {
                        if ($.isEmptyObject(response.responseJSON.error)) {
                            $("input[name='title']").val('');
                            $("textarea[name='subject']").val('');
                            $("input[name='picture']").val('');
                            $(".alert-danger").css('display', 'none');
                            $(".alert-success").css('display', 'block').fadeOut(3000);
                            $("#delModal").css('display', 'none');
                            $("#items").load(location.href + (' #items'));

                            console.log(response);

                        } else {
                            printErrorMsg(response.responseJSON.error);
                            console.log(response);
                        }
                    }
                });
            });
            /////////////Form (Edit)
            $(document).on("click", ".ourItem", function (event) {
                var id = $(this).find("#itemId").val();

                $("#modalTitle").text("عدل او احذف المشروع");
                //  var text = $.trim(text);
                //$("#addItem").val(text);
                $("#btnDel").show(400);
                $("#btnUp").show(400);
                $("#btnAdd").hide(400);
                $("#id").val(id);

                $.ajax({
                    url: 'editfut',
                    type: 'GET',
                    data: {'id': id},
                    success: function (response) {

                        console.log(response);
                         var picImg = response.picture;
                         $("#id").attr('value',response.id);
                        $("#picH").attr('value',response.picture);
                         $("#title").val(response.title);
                         $("#subject").val(response.subject);
                         $("#imgUp").attr('src', '../upload/' + picImg);
                         $("#imgUp").css('display', 'block');
                    }
                });
            });
            /////////////Delete Event
            $("#btnDel").click(function(event) {
                var id     = $("#id").val();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url : '/admin/deletefut',
                    type: "POST",
                    data: {'id':id, '_token':_token},
                    success:function(data){
                        console.log(data);
                        $("#items").load(location.href + (' #items'));
                    }
                });
            });
            /////////////Form (Add)
            $(document).on("click", "#clickAdd", function (event) {
                $("#modalTitle").text("أضف مشروع جديد");
                $("#title").val("");
                $("#subject").val("");
                $("#picture").val("");
                $("#imgUp").css('display', 'none');
                $("#btnDel").hide(400);
                $("#btnUp").hide(400);
                $("#btnAdd").show(400);
            });
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            $(document).ready(function () {
                mainApp.main_fun();
            });
        }(jQuery));
    </script>
@endsection