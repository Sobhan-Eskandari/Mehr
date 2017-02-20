@extends('layouts.zhenicSite')

@section('title')
    ژنیک | فروشگاه ها
@endsection

@section('js2')
    <script src="../js/jquery-2.1.4.min.js"></script>
@endsection

@section('css')
    <link href="../css/moreShopMain.css" rel="stylesheet" type="text/css" />
    <script src="../js/state-city.js"></script>
@endsection

@section('contactUs')
    {{ route('contactUs') }}
@endsection

@section('storeActive')
    active
@endsection

@section('content')

    <div style="display: none" class="carousel slide"  id="featured">
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
    <div style="display: none" class="button_box">
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

    <br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 dropDown_box">
                {!! Form::open(['method'=>'POST', 'action'=>'StoresController@FilterResults']) !!}
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="row">
                            {!! Form::label('market_type', 'نوع فروشگاه', ['class'=>'button_name']) !!}
                        </div>
                        <div class="row dropdown">
                            {!! Form::select('market_type', ['0' => 'همه'] + $market_type, $_POST['market_type'],['class'=>'btn dropdown-toggle btn_all']) !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="row">
                            {!! Form::label('percentage', 'درصد تخفیف', ['class'=>'button_name']) !!}
                        </div>
                        <div class="row dropdown">
                            {!! Form::select('percentage', ['0' => 'همه', '1' =>'0 تا 20 درصد', '2' => '20 تا 40 درصد', '3' => '40 تا 60 درصد', '4' => '60 تا 80 درصد', '5' => '80 تا 100 درصد'], $_POST['percentage'],['class'=>'btn dropdown-toggle btn_all']) !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="row">
                            {!! Form::label('city', 'شهرستان', ['class'=>'button_name']) !!}
                        </div>
                        <div class="row dropdown">
                            {!! Form::select('city', [$_POST['city'] => $_POST['city']], $_POST['city'], ['class'=>'btn dropdown-toggle btn_all']) !!}

                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="row">
                            {!! Form::label('state', 'استان', ['class'=>'button_name']) !!}
                        </div>
                        <div class="row">
                            {!! Form::select('state', $states, $_POST['state'], ['class'=>'btn dropdown-toggle btn_all']) !!}
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-3 col-md-offset-1 col-xs-4 col-xs-offset-0">
                        {!! Form::submit('فیلتر شدن', ['class'=>'btn filter_btn pull-left ']) !!}
                    </div>

                    <div class="col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 col-xs-4 col-xs-offset-0">
                        <label class="show_shop_title">نمایش برترین فروشگاه ها</label>
                    </div>

                    <div class="col-md-3 col-md-offset-1 col-xs-4 col-xs-offset-8">
                        <label class="switch">
                            @if (!isset($_POST['special']))
                                {!! Form::checkbox('special') !!}
                            @else
                                {!! Form::checkbox('special', 'value', true) !!}
                            @endif
                            <div id="filterBtn" class="slider round"></div>
                        </label>
                    </div>

                    <script>
                        var activated = false;

                        $( document ).ready(function() {
                            activated = localStorage.getItem("activated");


                            if (activated == "true"){
                                $("#filterBtn").css("background-color","#85C734");
                                // $(this).setAttribute('style', 'background-color:#f5f5f5 !important');
                            }else{
                                $("#filterBtn").css("background-color","#f5f5f5");
                                //$(this).setAttribute('style', 'background-color:#85C734 !important');
                            }
                        });

                        $( "#filterBtn" ).click(function() {

                            if (activated === "false"){
                                $("#filterBtn").css("background-color","#85C734");
                                activated = "true";
                                localStorage.setItem("activated", activated);
                            }else{
                                activated = "false";
                                $("#filterBtn").css("background-color","#f5f5f5");
                                localStorage.setItem("activated", activated);
                            }
                        });
                    </script>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-------allShops-------->

    <!----------------allShops first row---------------->

    <div class="container-fluid">
        <div class="row allShp_boxing top_border border_bottom">
            <br>
            @foreach($markets as $market)
                <div class="col-md-3 col-xs-6 pull-right thumbnail padding">
                    <div class="opac_layer">
                        @if(count($market->photos) >= 1)
                            <img src="../marketsPhotos/{{ $market->photos[0]['address'] }}" class="img-fluid radious_img" alt="Responsive image">
                        @else
                            <img src="https://placehold.it/200x200" class="img-fluid radious_img" alt="Responsive image">
                        @endif
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-2">
                                <div class="back_layer">
                                    <h2 class="name_shopping">{{ $market->market_name }}</h2>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-6 pull-right">
                                            <h3 class="detail_title"><a href="{{ route('stores.show', $market->id) }}" class="detail_title">مشاهده جزییات</a></h3>
                                        </div>

                                        <div class="col-xs-6 pull-left btn_upper">
                                            <span class="discunt_btn_img"><span class="percent">{{ $market->normal_percentage }}%</span>&nbsp;&nbsp;تخفیف</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if($markets->isEmpty())
                <div align="middle"><h3>نتیجه‌ای یافت نشد</h3></div>
            @endif
        </div>
        <br>
    </div>
    <!---------------------------------two button--------------------------------->


    {{--  pagination  --}}

    {{--<div class="row">--}}
    {{--<div class="col-lg-8 col-lg-offset-0 col-md-8 col-md-offset-0 col-xs-11 col-xs-offset-0 padding_pagination">--}}
    {{--<ul class="pagination">--}}

    {{--{{ $markets->links() }}--}}

    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}




    <!----------------------------------------------------------------------------->
    <!--BestShopping(start)-->

    <div class="box_card">
        <br>
        <!--shopping title-->
        <div class="container">
            <div class="row">
                <h2 class="best_title">فروشگاه های برتر ما</h2>
            </div>
        </div>

        <br><br><br>
        <!--shopping card-->
        <div class="container-fluid space_4_card">
            <div class="row ">

                @foreach($specialMarkets as $market)
                    <div class="col-md-3 col-xs-6 pull-right thumbnail padding">
                        <div class="opac_layer">
                            @if(count($market->photos) >= 1)
                                <img src="../marketsPhotos/{{ $market->photos[0]['address'] }}" class="img-fluid radious_img" alt="Responsive image">
                            @else
                                <img src="https://placehold.it/200x200" class="img-fluid radious_img" alt="Responsive image">
                            @endif
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-2">
                                    <div class="back_layer">
                                        <h2 class="name_shopping">{{ $market->market_name }}</h2>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-6 pull-right">
                                                <h3 class="detail_title"><a href="{{ route('stores.show', $market->id) }}" class="detail_title">مشاهده جزییات</a></h3>
                                            </div>

                                            <div class="col-xs-6 pull-left btn_upper">
                                                <span class="discunt_btn_img"><span class="percent">{{ $market->normal_percentage }}%</span>&nbsp;&nbsp;تخفیف</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-3 col-xs-6 col-xs-offset-1">

                    <a href="{{ route('BestMarkets') }}"><button class="btn first_shopping_btn">
                            فروشگاه های برتر
                        </button></a>

                </div>
            </div>
        </div>

        <br><br><br>
    </div>



@endsection

@section('js')
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
@endsection