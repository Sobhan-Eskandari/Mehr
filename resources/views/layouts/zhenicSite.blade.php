<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="تیم حروف نگار مجموعه ای خلاق است که تجربه دیجیتال نوینی را عرضه میکند">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        input[type="text"].inputSearchNav {
            border-top: 0;
            border-right: 0;
            border-left: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    </style>
    <!— The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags —>
    <title>@yield('title')</title>

    <!— Bootstrap —>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    @yield('js2')
    <!— Homepage Styles —>
    @yield('css')

    <!— HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries —>
    <!— WARNING: Respond.js doesn't work if you view the page via file:// —>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body>

<!--------------------------navbar--------------------------->
<div class="container-fluid">
    <div class="row">

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="">
                <div class="navbar-header">
                    <div class="back_img pull-left">
                        <a href="#" class="navbar-brand">
                            <img src="../images/horoof-negar-meshki.png" class="img_nav">
                        </a>
                    </div>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">


                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>

                <div class="collapse navbar-collapse" id="myNavbar">

                    <ul class="nav navbar-nav pull-right navbar-right">
                        <li class="main_navbar" id="flip"><a href="#">جستجو&nbsp;<small><i class="fa fa-search fa-sm" aria-hidden="true"></i></small></a></li>
                        <li class="main_navbar"><a href="@yield('contactUs')" class="@yield('contactActive')">تماس با ما</a></li>
                        <li class="main_navbar"><a href="{{ route('aboutUs') }}" class="@yield('aboutActive')">درباره ما</a></li>
                        <li class="main_navbar"><a href="{{ route('News.index') }}" class="@yield('newsActive')">اخبار</a></li>
                        <li class="main_navbar"><a href="{{ route('stores.index') }}" class="@yield('storeActive')">فروشگاه ها</a></li>
                        <li class="main_navbar"><a href="{{ route('homePage') }}" class="@yield('homeActive')">خانه</a></li>
                        <li class="enter_btn pull-right"><a class="navbar-brand pull-right" href="{{ route('login') }}">ورود</a></li>
                    </ul>


                </div>
                <!-------------------------search form-------------------->
                <div id="panel">
                    <div class="col-md-10  col-xs-9 pull-right">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                                </div>
                                <form method="POST" action="/search">
                                    {{csrf_field()}}
                                <input class="form-control inputSearchNav" type="text" id="inputSearchNav" tabindex="1" placeholder="عبارت مورد جستجو را وارد کنید" name="search">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2  col-xs-3 pull-left">
                        <button class="btn search_btn_nav pull-right">
                            <i class="fa fa-search fa-2x" aria-hidden="true"></i>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--carsul picture-->

@yield('content')


<!--EmailBox(end)-->
<br><br><br><br>
<!--Footer(start)-->

<div class="container-fluid">
    <div class="row">

        <!--social part of footer-->

        <div class="col-xs-12 col-md-4 col-lg-4 footer_part_one">

            <div class="row">
                <h3 class="get_zhenic_app">دریافت اپلیکیشن موبایل ژنیک</h3>
            </div>

            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 ">
                    <div class="row">

                        <div class="col-xs-12 get_zhenic_app_btn_col">
                            <button class="btn get_zhenic_app_btn">برای دریافت کلیک کنید&nbsp;&nbsp;&nbsp;<i class="fa fa-android footer_android" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <h4 class="contact_sub">با ما در شبکه های اجتماعی همراه باشید</h4>
            </div>

            <div class="row s_box">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="row">
                        <div class="col-xs-12 social_col">
                            <a href="{{ \App\SiteInfo::findOrFail(1)->telegram }}"><img src="../images/telegram2.png" class="img-responsive social_btn"></a>

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{ route('contactUs') }}"><img src="../images/email-icone.png" class="img-responsive social_btn"></a>

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{ \App\SiteInfo::findOrFail(1)->instagram }}"><img src="../images/instagram.png" class="img-responsive social_btn"></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--contact part of footer-->

        <div class="col-xs-12 col-md-4 col-lg-4 footer_part_two">

            <row>
                <h2 class="connect_way">با ما در تماس باشید</h2>
                <hr class="hr_under">
            </row>

            <row>
                <h5 class="exact_address"><i class="fa fa-map-marker nav_map" aria-hidden="true"></i>&nbsp;آدرس:{{ \App\SiteInfo::findOrFail(1)->address }}</h5>
            </row>

            <row>
                <h5 class="exact_address"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp;&nbsp;تلفن:{{ \App\SiteInfo::findOrFail(1)->contact_tel }}</h5>
            </row>

            <row>
                <h5 class="exact_address extra_pad"><i class="fa fa-mobile nav_map" aria-hidden="true"></i>&nbsp;موبایل:09301789263</h5>
            </row>
        </div>

        <!--menus part in footer-->

        <div class="col-xs-12 col-md-4 col-lg-4 footer_part_three">
            <div class="row">
                <div class="col-xs-6">
                    <row>
                        <ul class="list-group">
                            <li class="list-group-item"><h4 class="menu_footer menu_title_footer_right">منو ها</h4></li>
                            <li class="list-group-item"><a href="{{ route('homePage') }}"><h5 class="menu_footer">خانه</h5></a></li>
                            <li class="list-group-item"><a href="{{ route('stores.index') }}"><h5 class="menu_footer">فروشگاه ها</h5></a></li>
                            <li class="list-group-item"><a href="{{ route('aboutUs') }}"><h5 class="menu_footer">درباره ما</h5></a></li>
                            <li class="list-group-item"><a href="{{ route('contactUs') }}"><h5 class="menu_footer">تماس با ما</h5></a></li>
                            <li class="list-group-item"><a href="{{ route('login') }}"><h5 class="menu_footer">ورود</h5></a></li>
                        </ul>
                    </row>
                </div>
                <div class="col-xs-6">
                    <img src="../images/horoof-negar-sefid.png" class="footer_img pull-left">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid back_copy">
    <div class="row">
        <div class="col-xs-12">
            <p class="footer_moreInfo">تمامی حقوق این وبسایت متعلق به تیم توسعه حروف نگار می باشد</p>

            <P class="footer_moreInfo_cp">COPYRIGHT2016</P>
        </div>
    </div>
</div>

<!--Footer(end)-->

@yield('js')
</body>

</html>