<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>جمعية مكة المكرمة الخيرية</title>

    <!-- Bootstrap core CSS -->
    <link href="/makkah/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/makkah/vendor/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/makkah/css/shop-homepage.css" rel="stylesheet">
    @yield('css')


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">جمعية مكة المكرمة الخيرية</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" style="float: left">

            {{--<ul class="navbar-nav ml-auto">--}}
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="#">Home--}}
                        {{--<span class="sr-only">(current)</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">About</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Services</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Contact</a>--}}
                {{--</li>--}}
            {{--</ul>--}}

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">تسجيل مستخدم جديد |</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a></li>
                @else
                    @if(Auth::user()->id == 1)
                    <a href="/admin" class="nav-link" style="background-color: #0b2e13 ;color: floralwhite">
                        لوحة التحكم
                    </a>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    تسجيل الخروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">جمعية مكة</h1>
            <div class="list-group">
                <a href="/" class="list-group-item">الصفحة الرئيسية</a>
                <a href="/news" class="list-group-item">أرشيف الأخبار</a>
                <a href="/completepro" class="list-group-item">المشاريع المنجزة</a>
                <a href="/futurepro" class="list-group-item">المشاريع المستقبلية</a>
                <a href="/album" class="list-group-item">ألبوم الصور</a>
                <a href="#" class="list-group-item">أكفل...</a>
                <a href="#" class="list-group-item">عن الجمعية</a>
                <a href="#" class="list-group-item">من نحن</a>
                <a href="#" class="list-group-item">اتصل بنا</a>
            </div>

            <h2 class="my-4">شاركهم أحزانهم</h2>
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <img src="#" width="150" height="150">
                </a>
            </div>

            <h2 class="my-4">شارك برأيك</h2>
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <img src="#" width="150" height="150">
                </a>
            </div><br>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
            @yield('content')
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">
            Copyright &copy; Your Website 2017
        </p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/makkah/vendor/jquery/jquery.min.js"></script>
<script src="/makkah/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@yield('script')
</body>

</html>
