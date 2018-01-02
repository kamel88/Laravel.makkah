
@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <br><br><br>
            <h1>جمعية مكة المكرمة الخيرية - معرض الصور</h1>

            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 2" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/2255EE"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 3" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/449955/FFF"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 4" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/992233"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 5" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/2255EE"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 6" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/449955/FFF"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 8" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/777"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 9" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/992233"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 10" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/EEE"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 11" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/449955/FFF"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 12" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/DDD"></a></div>
            <div style="margin-bottom:6px" class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 13" href="#"><img class="thumbnail img-responsive" src="//placehold.it/150x150/992233"></a></div>

            <hr>

            <hr>
        </div>
    </div>
    <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h3 class="modal-title">Heading</h3>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script>
        $(document).ready(function () {
            $('.thumbnail').click(function () {
                $('.modal-body').empty();
                var title = $(this).parent('a').attr("title");
                $('.modal-title').html(title);
                $($(this).parents('div').html()).appendTo('.modal-body');
                $('#myModal').modal({show: true});
            });
        });
    </script>
@endsection

@endsection