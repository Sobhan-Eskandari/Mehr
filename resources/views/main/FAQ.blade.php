@extends('layouts.zhenicSite')

@section('title')
    مهرکارت | سوالات متداول
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
@endsection

@section('css')
    <link href="css/aboutZhenic.css" rel="stylesheet" type="text/css" />
    <link href="css/homePage.css" rel="stylesheet" type="text/css" />
@endsection

@section('contactUs')
    {{ route('contactUs') }}
@endsection

@section('content')

    <div class="container" id="services_container">
        <div class="row">
            <div id="service_title" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!------------ Detail of Service ------------>
                <img src="images/horoof-negar-meshki.png" class="img-responsive">
                <h2>سوالات متداول</h2>
                <br>
                @foreach($FAQs as $FAQ)
                    <div class="col-lg-5 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 services_small_Sect">
                        <h4>{{ $FAQ->question }}</h4>
                        <p class="text_news" id="{{ $FAQ->id }}">{{ $FAQ->answer }}</p>
                        <p class="text_news" id="{{ $FAQ->id }}_show"></p>
                    </div>
                    <script>
                        $( document ).ready(function() {
                            $('#{{ $FAQ->id }}_show').html($('#{{ $FAQ->id }}').text());
                            $('#{{ $FAQ->id }}').css("display","none")
                        });
                    </script>
                @endforeach
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                        <textarea id="news_text">{{ \App\SiteInfo::findOrFail(1)->faq }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12" id="news_text_show">
                        <textarea>{{ \App\SiteInfo::findOrFail(1)->faq }}</textarea>
                    </div>
                </div>

                <script>
                    $( document ).ready(function() {
                        $('#news_text_show').html($('#news_text').text());
                        $('#news_text').css("display","none")
                    });
                </script>
{{--                <p>{{ \App\SiteInfo::findOrFail(1)->faq }}</p>--}}
                {{--<h3>کار ما فروش قالب نیست ما تجربیات دیجیتال خلق میکنیم</h3>--}}
            </div>
        </div>
        {{--<!------------ Small Features Detail ------------>--}}
        {{--<div class="row features">--}}
            {{--<div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1--}}
                     {{--col-sm-5 col-sm-offset-1 col-xs-10 services_small_Sect">--}}
                {{--<h4>کار ما فروش قالب نیست ما تجربیات دیجیتال خلق میکنیم</h4>--}}
                {{--<p>اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزهعتماد هستند که این امر باعث شده تا در 7 سال اخیر برترین برند های کشور پروژه های خود را به ما بسپارند.تخصص ما ایجاد سایتهای شخصی و تجاری , رابط کاربری , اپلیکیشن ها و هر نوع خدمات دیجیتال است.اگر به دنبال برنامه نویسی با کیفیت هستید ما برای انجام آن آماده ایم زیرا این فقط شغل ما</p>--}}
            {{--</div>--}}
            {{--<div class="col-lg-5 col-lg-offset-0 col-md-5 col-md-offset-0--}}
                     {{--col-sm-5 col-sm-offset-0 col-xs-10 services_small_Sect">--}}
                {{--<h4>کار ما فروش قالب نیست ما تجربیات دیجیتال خلق میکنیم</h4>--}}
                {{--<p>اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزهعتماد هستند که این امر باعث شده تا در 7 سال اخیر برترین برند های کشور پروژه های خود را به ما بسپارند.تخصص ما ایجاد سایتهای شخصی و تجاری , رابط کاربری , اپلیکیشن ها و هر نوع خدمات دیجیتال است.اگر به دنبال برنامه نویسی با کیفیت هستید ما برای انجام آن آماده ایم زیرا این فقط شغل ما</p>--}}
            {{--</div>--}}

        {{--</div>--}}
    </div>

@endsection

@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
@endsection