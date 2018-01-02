<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>جمعية مكة المكرمة الخيرية - غزة</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="/admincp/css/bootstrap.css" rel="stylesheet" />
    <link href="/admincp/css/bootstrap-rtl.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/admincp/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="/admincp/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="/admincp/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="/admincp/css/style.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href={{asset('/')}}>جمعية مكة المكرمة</a>
        </div>
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: left;
font-size: 16px;"> {{ Auth::user()->name  }} &nbsp;
                <a class="btn btn-danger square-btn-adjust" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                تسجيل الخروج</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">

            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="/admincp/img/find_user.png" class="user-image img-responsive"/>
                </li>

                <li class="">
                    <a href="#"><i class="fa fa-bars fa-2x"></i>&nbsp;&nbsp;&nbsp;الاقسام العامة<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{asset('admin/comments')}}>التعليقات</a>
                        </li>
                        <li>
                            <a href="#">القصة</a>
                        </li>                
                        <li>
                            <a href="#">الاستفتاءات</a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#"><i class="fa fa-newspaper-o fa-2x"></i>&nbsp;&nbsp;&nbsp;قـائمـة الأخـبـار<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{asset('admin/newsadd')}}>إضـافـة خـبـر</a>
                        </li>
                        <li>
                            <a href={{asset('admin/news')}}>عـرض الاخـبـار</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class=""  href={{asset('admin/projectcom')}}><i class="fa fa-th-list fa-2x"></i>&nbsp;&nbsp;&nbsp;المشاريع المنجزة</a>
                </li>

                <li>
                    <a class=""  href={{asset('admin/projectfut')}}><i class="fa fa-tasks fa-2x"></i>&nbsp;&nbsp;&nbsp;المشاريع المستقبلية</a>
                </li>

                <li>
                    <a class=""  href="#"><i class="fa fa-picture-o fa-2x"></i>&nbsp;&nbsp;&nbsp;ألبوم الصور</a>
                </li>

                <li class="">
                    <a   href="#"><i class="fa fa-key fa-2x"></i>&nbsp;&nbsp;&nbsp;تغيير كلمة المرور</a>
                </li>
                <li class="">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-unlock fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;تسجيل الخروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav><!-- /. NAV SIDE  -->

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

        <script src="/admincp/js/jquery-1.10.2.js"></script>
        <script src="/admincp/js/jquery.form.min.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="/admincp/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="/admincp/js/jquery.metisMenu.js"></script>
        <!-- MORRIS CHART SCRIPTS -->
        <script src="/admincp/js/morris/raphael-2.1.0.min.js"></script>
        <script src="/admincp/js/morris/morris.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="/admincp/js/custom.js"></script>
        <script src="/admincp/js/plugins.js"></script>

        @yield('script')
</div>
</body>
</html>