<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="تيم حروف نگار مجموعه اي خلاق است که تجربه ديجيتال نويني را عرضه ميکند">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script src="//cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
    @yield('js2')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="@yield('pms')" rel="stylesheet" type="text/css" />
    <link href="@yield('css')" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="@yield('bootstrap_select')">
    <link rel="stylesheet" href="@yield('sidebar')">
</head>

<body >


<div class="container-fluid height_vh">
    <div class="row height_vh">

        <!--main box(white)-->
        <div class="col-xs-10 scroll_padding">
            <!--menu_bar-->
            <div class="row menu_shadow">
                <div class="col-xs-4 pull-right home_top">
                    <h4><a href="{{ route('homePage') }}" class="zhenic_menubar"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;ژنيک</a></h4>
                </div>

                <div class="col-xs-4 pull-left exit_up">
                    <h4>
                        <form class="exit_menubar" id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: inline;">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-defaul"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;خروج</button>
                        </form>
                    </h4>
                </div>

                @yield('submit')

            </div>

            <!--spline part-->
            <div class="scrollbar">
                <div class="row">
                    <div class="col-xs-12 spline">&nbsp;</div>
                </div>

                @yield('content')

            </div>
        </div>

        <!--sideBar-->
        <div class="col-xs-2 admin_sidebar pull-right">
            <h5 class="zhenic_title">ژنيک</h5>
            <a href="{{ route('markets.index') }}"><h5 class="admin_side_title @yield('markets')"><i class="fa fa-file-text-o set_fa pull-right" aria-hidden="true"></i><span class="hidden-xs">فروشگاه ها</span></h5></a>

            <a href="{{ route('customers.index') }}"><h5 class="admin_side_title @yield('customers')"><i class="fa fa-user set_fa pull-right" aria-hidden="true"></i><span class="hidden-xs">مشتری ها</span></h5></a>

            <a href="{{ route('messages.index') }}"><h5 class="admin_side_title @yield('messages')"><i class="fa fa-comments set_fa pull-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;پيام ها&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge pull-left">{{ \App\Message::whereRead(0)->count() }}</span></h5></a>

            <a href="{{ route('News.DashIndex') }}"><h5 class="admin_side_title @yield('announcement')"><i class="fa fa-bullhorn set_fa pull-right" aria-hidden="true"></i><span class="hidden-xs">اخبار</span></h5></a>

            <a href="{{ route('settings.index') }}"><h5 class="admin_side_title @yield('settings')"><i class="fa fa-cogs set_fa pull-right" aria-hidden="true"></i><span class="hidden-xs">تنظيمات</span></h5></a>

            <a href="{{route('marketCategories.index')}}"><h5 class="admin_side_title left_space @yield('categories')"><i class="fa fa-th-list set_fa pull-right" aria-hidden="true"></i><span class="hidden-xs">دسته بندی فروشگاه</span></h5></a>

            <a href="{{route('systemicCategories.index')}}"><h5 class="admin_side_title left_space @yield('systemic')"><i class="fa fa-th-list set_fa pull-right xs_pr" aria-hidden="true"></i><span class="hidden-xs">دسته بندی سیستمی</span></h5></a>

            <a href="{{route('regTypes.index')}}"><h5 class="admin_side_title @yield('regType')"><i class="fa fa-th-list set_fa pull-right" aria-hidden="true"></i><span class="hidden-xs">نوع عضویت</span></h5></a>

            <a href="{{route('tags.index')}}"><h5 class="admin_side_title @yield('tags')"><i class="fa fa-tags set_fa pull-right" aria-hidden="true"></i><span class="hidden-xs">تگ ها</span></h5></a>

            <a href="{{route('backup')}}"><h5 class="admin_side_title @yield('backup')"><i class="fa fa-upload set_fa pull-right" aria-hidden="true"></i><span class="hidden-xs">فايل پشتيبان</span></h5></a>
        </div>
    </div>
</div>

    @yield('js')
</body>

</html>
