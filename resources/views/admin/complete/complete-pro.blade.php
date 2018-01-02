@extends('admin.master')

@section('content')

    <a class="btn btn-primary btnInsert" role="button" data-toggle="collapse" href="#collapseExample"
       aria-expanded="false" aria-controls="collapseExample">
        أضف مشروع جديد</a>

    <div class="collapse" id="collapseExample">
        <div class="well">

            <!---ADD Form-->
            <form id="addForm">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="alert alert-success" style="display:none">
                    <ul>
                        <li>تم اضافة المشروع بنجاح</li>
                    </ul>
                </div>

                <div class="form-group">
                    <label>عنوان المشروع</label>
                    <input type="text" name="title" class="form-control" placeholder="اضف عنوانا للمشروع ....">
                </div>

                <div class="form-group">
                    <label>كتابة المشروع</label>
                    <textarea rows="4" name="subject" class="form-control" placeholder="اضف المشروع ......"></textarea>
                </div>

                <div class="form-group">
                    <label>اضف صورة</label>
                    <input type="file" name="picture" class="form-control">
                </div>

                <div class="form-group">
                    <button id="btnAdd" type="submit" class="btn btn-success">اضافة مشروع</button>
                </div>
            </form>
        </div>
    </div>

    <div class="panel-body">
        <ul class="list-group" id="clickDelEdit">
            @foreach($complete as $com)
                <li class="list-group-item" data-toggle="modal" data-target="#comModal" id="showTitle">
                    {{ $com->title }}
                    <button id="test" value="{{$com->id."-".$com->picture}}" type="button"
                            class="btn btn-danger btn-sm pull-left" data-toggle="modal" data-target="#delModal">حــذف
                    </button>
                    <button id="editBtn" value="{{$com->id}}" type="button"
                            class="btn btn-warning btn-sm pull-left" data-toggle="modal" data-target="#updateModal"
                            style="margin: 0 0 0 5px">تعـديـل
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="delModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">هل أنت متأكد من حذف المشروع!!!</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <input type="hidden" id="pic2">
                    <p id="successDel0">إذا كنت متأكد من حذف المشروع , إضغط زر حذف , إذا أردت التراجع إضغط اغلاق .</p>
                    <div id="successDel1" class="alert alert-success" style="display:none">
                        <ul>
                            <li>تم الحذف بنجاح..</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button id="btnDel" type="button" class="btn btn-danger">حـذف المشروع</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- /.modal For Update -->
    <div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تعديل على المشروع</h4>
                </div>
                <div class="modal-body">

                    <form id="updateForm">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="idUp" name="id">

                        <div class="form-group">
                            <label>عنوان المشروع</label>
                            <input type="text" name="titleUp" id="titleUp" class="form-control"
                                   placeholder="اضف عنوانا للمشروع ....">
                        </div>

                        <div class="form-group">
                            <label>كتابة المشروع</label>
                            <textarea rows="4" name="subjectUp" id="subjectUp" class="form-control"
                                      placeholder="اضف المشروع ......"></textarea>
                        </div>

                        <div class="form-group" id="imgNew">
                            <img id="imgUp" name="pictureUp" width="160" height="120" alt="picture">
                        </div>

                        <div class="form-group">
                            <label>اضف صورة</label>
                            <input type="file" name="pictureUp" id="pictureUp" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button id="btnUpdate" type="submit" class="btn btn-primary">حفظ التغييرات</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{ csrf_field() }}
@endsection

@section('script')
    <script type="text/javascript">
        (function ($) {
            ///////////////////////////ADD
            $("#btnAdd").on("click", function (e) {
                $("#addForm").ajaxForm({

                    url: '/admin/projectcom',
                    type: 'POST',

                    complete: function (response) {
                        if ($.isEmptyObject(response.responseJSON.error)) {
                            $("input[name='title']").val('');
                            $("textarea[name='subject']").val('');
                            $("input[name='picture']").val('');
                            $(".alert-danger").css('display', 'none');
                            $(".alert-success").css('display', 'block').fadeOut(3000);
                            $("#delModal").css('display', 'none');

                            $("#clickDelEdit").load(location.href + (' #clickDelEdit'));
                        } else {
                            printErrorMsg(response.responseJSON.error);
                        }
                    }
                });
            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            ///////////UPDATE
            $("#btnUpdate").click(function (e) {
                $("#updateForm").ajaxForm({
                    url: '/admin/updatecom',
                    type: 'POST',
                    complete: function (response) {
                        if ($.isEmptyObject(response.responseJSON.error)) {
                            $("#clickDelEdit").load(location.href + (' #clickDelEdit'));

                            //console.log(response);
                        }
                        else {
                            printErrorMsg(response.responseJSON.error);

                            $("#clickDelEdit").load(location.href + (' #clickDelEdit'));

                            //console.log(response);
                        }
                    }
                });
            });
            /////////////Edit Form
            $(document).on("click", "#editBtn", function (event) {
                var id = $(this).val();

                $.ajax({
                    url: '/admin/editcom',
                    type: 'GET',
                    data: {'id': id},

                    success: function (response) {
                        $("#idUp").attr('value', response.id);
                        //$("#picH").attr('value',results[idsp2].picture);
                        var picImg = response.picture;
                        $("#titleUp").val(response.title);
                        $("#subjectUp").val(response.subject);
                        $("#imgUp").attr('src', '../upload/' + picImg);
                        //     $("#imgUp").css('display', 'block');

                        console.log(results[idsp2].id);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
            /////////////Delete Form
            $(document).on("click", "#test", function (event) {
                var idD = $(this).val();
                var spl = idD.split('-');
                var idspl = spl[0];
                var picspl = spl[1];
                //console.log(picspl);
                $("#id").html(idspl);
                $("#pic2").html(picspl);
            });
            /////////////Delete Event
            $("#btnDel").click(function (event) {
                var id2 = $("#id").text();
                var id = parseInt(id2);
                var pic3 = $("#pic2").text();
                var _token = $('input[name=_token]').val();
                //console.log(pic3+' '+ id);
                $.ajax({
                    url: '/admin/deletecom',
                    type: "POST",
                    data: {'id': id, '_token': _token, 'picture': pic3},
                    success: function (data) {
                        $("#successDel0").css('display', 'none');
                        $("#successDel1").css('display', 'block').fadeOut(3000);
                        $('#delModal').modal('hide');
                        console.log(data);
                        $("#clickDelEdit").load(location.href + (' #clickDelEdit'));
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $(document).ready(function () {
                mainApp.main_fun();
            });
        }(jQuery));
    </script>
@endsection