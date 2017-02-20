@extends('layouts.zhenicSite')

@section('title')
    ژنیک | سوالات متداول
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
    <style>
        .h4, h4 {
            font-size: 17px;
        }
    </style>
@endsection

@section('css')
    <link href="css/faq.css" rel="stylesheet" type="text/css" />
@endsection

@section('contactUs')
    {{ route('contactUs') }}
@endsection

@section('content')

    <div class="carousel slide"  id="featured">
    <!--button slideShow-->
    <ol class="carousel-indicators">
        <li data-target="#featured" data-slide-to="0" class="active"></li>
        <li data-target="#featured" data-slide-to="1"></li>
        <li data-target="#featured" data-slide-to="2"></li>
    </ol>
    <!--img slideShow-->
    <div class="carousel-inner">
        <div class="item active">
            @if (count($sliders) >= 1)
                <img src="ZhenicImages/{{ $sliders[0]['address'] }}" class="slideShow_img">
            @else
                <img src="https://placehold.it/4000x1700" class="slideShow_img">
            @endif
        </div>
        <div class="item">
            @if (count($sliders) >= 2)
                <img src="ZhenicImages/{{ $sliders[1]['address'] }}" class="slideShow_img">
            @else
                <img src="https://placehold.it/4000x1700" class="slideShow_img">
            @endif
        </div>
        <div class="item">
            @if (count($sliders) >= 3)
                <img src="ZhenicImages/{{ $sliders[2]['address'] }}" class="slideShow_img">
            @else
                <img src="https://placehold.it/4000x1700" class="slideShow_img">
            @endif
        </div>
    </div>
    <!--left and right button slide show-->
    <a class="left carousel-control" href="#featured" role="button"  data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>

    <a class="right carousel-control" href="#featured" role="button"  data-slide="next" >
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

<!--button section-->
<div class="button_box">
    <div class="container button_container">
        <div class="row">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <div class="btn-group col-xs-10 col-xs-offset-1">
                            <button type="button" class="btn different_question_img"> <i class="fa fa-file-text-o" aria-hidden="true"></i></button>
                            <button type="button" class="btn different_question"><a href="{{ route('FAQ') }}">سوالات متداول</a></button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <div class="btn-group col-xs-10 col-xs-offset-1">
                            <button type="button" class="btn shopping_img"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
                            <button type="button" class="btn shopping">فروشگاه ها روی نقشه</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <div class="btn-group col-xs-10 col-xs-offset-1">
                            <button type="button" class="btn android_img"><i class="fa fa-android" aria-hidden="true"></i></button>
                            <button type="button" class="btn android">دانلود اپلیکیشن ژنیک</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="faq_container">
    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="row">
                    <div id="faq_title" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>سوالات متداول</h2>
                        <br>
                    </div>
                </div>
                <!------------ quesiotns and answers ------------>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 line">
                        <h4 class="question_ans_cadr">اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزه مشترک وی نخواهد بود
                        </h4>
                        <p class="question_ans_cadr"><span>پاسخ : </span>اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزه مشترک وی نخواهد بود
                        </p>
                        <hr class="faq_hr">
                        <h4 class="question_ans_cadr">اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزه مشترک وی نخواهد بود
                        </h4>
                        <p class="question_ans_cadr"><span>پاسخ : </span>اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزه مشترک وی نخواهد بود
                        </p>
                    </div>
                    <div class="col-lg-6 col-lg-md-6 col-sm-6 col-xs-12">
                        <h4 class="question_ans_cadr">اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزه مشترک وی نخواهد بود
                        </h4>
                        <p class="question_ans_cadr"><span>پاسخ : </span>اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزه مشترک وی نخواهد بود
                        </p>
                        <hr class="faq_hr">
                        <h4 class="question_ans_cadr">اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزه مشترک وی نخواهد بود
                        </h4>
                        <p class="question_ans_cadr"><span>پاسخ : </span>اهدای جایزه چتم هاوس به جان کری. پیشتر اعلام شده بود جواد ظریف به دلیل برنامه‌های از پیش تعیین شده قادر به حضور در مراسم اهدا جایزه مشترک وی نخواهد بود
                        </p>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
@endsection