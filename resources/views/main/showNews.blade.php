@extends('layouts.zhenicSite')

@section('title')
    ژنیک | اطلاعیه‌ها
@endsection

@section('js2')
    <script src="../js/jquery-2.1.4.min.js"></script>
@endsection

@section('css')
    <link href="../css/openNews.css" rel="stylesheet" type="text/css" />
@endsection

@section('contactUs')
    {{ route('contactUs') }}
@endsection

@section('newsActive')
    active
@endsection

@section('content')
<!--carsul picture-->

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
                <img src="../ZhenicImages/{{ $sliders[0]['address'] }}" class="slideShow_img">
            @else
                <img src="https://placehold.it/4000x1700" class="slideShow_img">
            @endif
        </div>
        <div class="item">
            @if (count($sliders) >= 2)
                <img src="../ZhenicImages/{{ $sliders[1]['address'] }}" class="slideShow_img">
            @else
                <img src="https://placehold.it/4000x1700" class="slideShow_img">
            @endif
        </div>
        <div class="item">
            @if (count($sliders) >= 3)
                <img src="../ZhenicImages/{{ $sliders[2]['address'] }}" class="slideShow_img">
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
                            <button type="button" class="btn different_question"><a href="{{ route('FAQ') }}" class="a_dec">سوالات متداول</a></button>
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
<!---------------------news section----------------->
<div class="container-fluid news">
    <div class="row">
        <div class="col-lg-2 col-md-5 col-sm-5 col-xs-10 pull-right">
            <h4 class="news_info_title">اخبار و اطلاعیه‌ها</h4>
        </div>

        @foreach($rollingNews as $rolling)
            <div class="col-lg-3 col-md-5 col-sm-5 col-xs-10 between_space">
                <div class="row border_news">
                    <div class="col-xs-2 pull-right news_title">
                        <span class="news_title">اخبار</span>
                    </div>
                    <div class="col-xs-10 pull-left explain_news">
                        <a href="{{ route('News.show', $rolling->id) }}"><marquee direction="right">{{ $rolling->title }}</marquee></a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
<!--------------------------more news------------------->
<div class="container-fluid container-fluid_moreNews">
    <div class="row border_box_moreNews">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                <h3 class="title_news">{{ $news->title }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                <textarea id="news_text">{{ $news->body }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12" id="news_text_show">
                <textarea>{{ $news->body }}</textarea>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function() {
            $('#news_text_show').html($('#news_text').text());
            $('#news_text').css("display","none")
        });
    </script>
</div>
@endsection

@section('js')
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
@endsection