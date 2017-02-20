@extends('layouts.zhenicSite')

@section('title')
    ژنیک | خانه
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
@endsection

@section('css')
    <link href="css/homePage.css" rel="stylesheet" type="text/css" />
@endsection

@section('contactUs')
    #down
@endsection

@section('homeActive')
    active
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

    <!---------------------news section----------------->
    <div class="container-fluid news">
        <div class="row">
            <div class="col-lg-2 col-md-5 col-sm-5 col-xs-10 pull-right">
                <h4 class="news_info_title">
                    اخبار و اطلاعیه ها:
                </h4>
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
    <!--ZhenicService-->
    <div class="container service_box">
        <div class="row">
            <div class="col-xs-4 top">
                <hr class="hr_service">
            </div>
            <div class="col-xs-4">
                <h1 class="service_title">خدمات ژنیک</h1>
            </div>
            <div class="col-xs-4 top">
                <hr class="hr_service">
            </div>
        </div>
    </div>
    <!--ZhenicDiscount(start)-->
    <!--firstBox(Discount)-->
    <div class="container-fluid container-fluid-discount">
        <div class="row">


            <div class=" actionImg2 col-lg-3 col-md-6 col-xs-6">

                <div class="row upper_hover">
                    <div class="col-xs-8 col-xs-offset-2 discount_box one">
                        <img src="images/takhfif-icone.png" class="discount_img">
                        <h2 class="discount_title">تخفیفات ویژه ژنیک</h2>
                    </div>
                </div>


                <div class="hover_first">
                    <div class="sub_tit_first">


                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2 second_box">
                                <img src="images/white-icone.png" class="discount_img_hover hidden-xs">
                                <h4 class="discount_title_hover">تخفیفات ویژه ژنیک</h4>
                                <h4 class="moreExplain">ما یک شرکت ارایه کننده خدمات مبتنی بر وب در تهران هستیم و اعضای تیم ما در تخصص خود حرفه ای،با تجربه و قابل اعتماد هستند</h4>
                                <a href="{{ route('services', ['id'=>1]) }}"><button class="details_btn btn">جزییات بیشتر</button></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <!--secondBox(Discount)-->

            <div class=" actionImg2 col-lg-3 col-md-6 col-xs-6">

                <div class="row upper_hover">
                    <div class="col-xs-8 col-xs-offset-2 discount_box one">
                        <img src="images/takhfif-icone.png" class="discount_img">
                        <h2 class="discount_title">تخفیفات ویژه ژنیک</h2>
                    </div>
                </div>


                <div class="hover_first">
                    <div class="sub_tit_first">


                        <div class="row ">
                            <div class="col-xs-8 col-xs-offset-2 second_box">
                                <img src="images/white-icone.png" class="discount_img_hover hidden-xs">
                                <h4 class="discount_title_hover">تخفیفات ویژه ژنیک</h4>
                                <h4 class="moreExplain">ما یک شرکت ارایه کننده خدمات مبتنی بر وب در تهران هستیم و اعضای تیم ما در تخصص خود حرفه ای،با تجربه و قابل اعتماد هستند</h4>
                                <a href="{{ route('services', ['id'=>3]) }}"><button class="details_btn btn">جزییات بیشتر</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!--thirdBox(Discount)-->
            <div class=" actionImg2 col-lg-3 col-md-6 col-xs-6">

                <div class="row upper_hover">
                    <div class="col-xs-8 col-xs-offset-2 discount_box one">
                        <img src="images/takhfif-icone.png" class="discount_img">
                        <h2 class="discount_title">تخفیفات ویژه ژنیک</h2>
                    </div>
                </div>


                <div class="hover_first">
                    <div class="sub_tit_first">


                        <div class="row ">
                            <div class="col-xs-8 col-xs-offset-2 second_box">
                                <img src="images/white-icone.png" class="discount_img_hover hidden-xs">
                                <h4 class="discount_title_hover">تخفیفات ویژه ژنیک</h4>
                                <h4 class="moreExplain">ما یک شرکت ارایه کننده خدمات مبتنی بر وب در تهران هستیم و اعضای تیم ما در تخصص خود حرفه ای،با تجربه و قابل اعتماد هستند</h4>
                                <a href="{{ route('services', ['id'=>2]) }}"><button class="details_btn btn">جزییات بیشتر</button></a>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!--fourthBox(Discount)-->

            <div class=" actionImg2 col-lg-3 col-md-6 col-xs-6">

                <div class="row upper_hover">
                    <div class="col-xs-8 col-xs-offset-2 discount_box one">
                        <img src="images/takhfif-icone.png" class="discount_img">
                        <h2 class="discount_title">تخفیفات ویژه ژنیک</h2>
                    </div>
                </div>


                <div class="hover_first">
                    <div class="sub_tit_first">


                        <div class="row ">
                            <div class="col-xs-8 col-xs-offset-2 second_box">
                                <img src="images/white-icone.png" class="discount_img_hover hidden-xs">
                                <h4 class="discount_title_hover">تخفیفات ویژه ژنیک</h4>
                                <h4 class="moreExplain">ما یک شرکت ارایه کننده خدمات مبتنی بر وب در تهران هستیم و اعضای تیم ما در تخصص خود حرفه ای،با تجربه و قابل اعتماد هستند</h4>
                                <a href="{{ route('services', ['id'=>1]) }}"><button class="details_btn btn">جزییات بیشتر</button></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--ZhenicDiscount(end)-->
    <br><br><br><br>
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
                <!--first card-->
                @foreach($specialMarkets as $market)
                    @if($market->market_type == 1)
                        <div class="col-md-3 col-xs-6 pull-right thumbnail padding">
                            <div class="opac_layer">
                                @if(count($market->photos) >= 1)
                                    <img src="marketsPhotos/{{ $market->photos[0]['address'] }}" class="img-fluid radious_img" alt="Responsive image">
                                @else
                                    <img src="https://placehold.it/200x200" class="img-fluid radious_img" alt="Responsive image">
                                @endif
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-2 ">
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
                    @endif
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
    <!--BestShopping(end)-->
    <!--ZhenicShopping(start)-->
    <div class="container service_box">
        <div class="row">
            <div class="col-xs-4 top">
                <hr class="hr_service">
            </div>
            <div class="col-xs-4">
                <h1 class="service_title">فروشگاه های ژنیک</h1>
            </div>
            <div class="col-xs-4 top">
                <hr class="hr_service">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            @foreach($normalMarkets as $market)
                @if($market->market_type == 0)
                <div class="box actionImg3 col-xs-6">
                    @if(count($market->photos) >= 1)
                        <img src="marketsPhotos/{{ $market->photos[0]['address'] }}" class="img-fluid radious_img" alt="Responsive image">
                    @else
                        <img src="https://placehold.it/200x200" class="img-fluid radious_img" alt="Responsive image">
                    @endif
                    <div class="hover">
                        <div class="sub_tit">
                            <div class="row">
                                <h1 class="title_nagm">{{ $market->market_name }}</h1>
                            </div>
                            <div class="row">
                                <h3 class="percent_discount">{{ $market->normal_percentage }}% تخفیف</h3>
                            </div>
                            <div class="row">
                                <div class="col-xs-8 col-xs-offset-2">
                                    <a href="{{ route('stores.show', $market->id) }}"><button class="btn vision">مشاهده جزییات</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
        @endforeach

        </div>
    </div>

    <br>

    <!--zhenic button list-->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 list_shopping_zhenic">

                <button class="btn list_shopping_zhenic_btn"><img src="images/All-page-icone.png" class="All-page-icone" href="{{ route('stores.index') }}">&nbsp;&nbsp;<a href="{{ route('stores.index') }}" class="init">مشاهده لیست تمامی فروشگاه های ژنیک</a></button>

            </div>
        </div>
    </div>
    <!--ZhenicShopping(end)-->
    <br>
    <!--EmailBox(start)-->
    <div class="box_card_email" id="down">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 email_box">
                    <div class="row">
                        <div class="col-xs-6 social_box">

                            <div class="row">
                                <div class="col-xs-12">
                                    <h1 class="contact_with_us_btn"><a href="#contact_with_us_btn"></a>با ما در تماس باشید</h1>

                                </div>
                            </div>

                            <br><br>

                            <!--contact title in emailbox-->
                            <div class="row">
                                <div class="col-xs-6 padding_social">
                                    <h1 class="tNumber_title">شماره تماس ژنیک</h1>
                                </div>
                                <div class="col-xs-6 padding_social">
                                    <img src="images/telephone-icone.png" class="telephone-icone">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-6 padding_social">
                                    <h1 class="tNumber_title">آدرس ژنیک</h1>
                                </div>
                                <div class="col-xs-6 padding_social">
                                    <img src="images/location-icone.png" class="telephone-icone">
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-xs-6 padding_social">
                                    <h1 class="tNumber_title">اینستاگرام ژنیک</h1>
                                </div>
                                <div class="col-xs-6 padding_social">
                                    <img src="images/instagram-icone.png" class="telephone-icone">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-6 padding_social">
                                    <h1 class="tNumber_title">تلگرام ژنیک</h1>
                                </div>
                                <div class="col-xs-6 padding_social">
                                    <img src="images/telegram-icone.png" class="telephone-icone">
                                </div>
                            </div>

                        </div>
                        <!--email input-->
                        <div class="col-xs-6 purple_box">

                            <div class="row">
                                <h1 class="email_title">پیغام خود را بگذارید</h1>
                            </div>
                            <br>
                            {!! Form::open(['method'=>'POST', 'action'=>'MessageController@store']) !!}
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            {!! Form::text('contact_number', null, ['class'=>'form-control inputNumber', 'id'=>'inputNumber', 'placeholder'=>'شماره تماس خود را وارد کنید', 'tabindex'=>'2']) !!}
                                        </div>

                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            {!! Form::text('name', null, ['class'=>'form-control inputName', 'id'=>'inputName', 'placeholder'=>'نام خود را وارد کنید', 'tabindex'=>'1']) !!}
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="form-group">
                                            {!! Form::text('email', null, ['class'=>'form-control inputEmail', 'id'=>'inputEmail', 'placeholder'=>'ایمیل خود را وارد کنید', 'tabindex'=>'3']) !!}
                                        </div>

                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group textOfAnswer">
                                            {!! Form::textarea('message', null,['class'=>'form-control answer_answer', 'id'=>'inputComments_answer', 'placeholder'=>'متن پیام خود را وارد کنید', 'rows'=>4, 'tabindex'=>'4']) !!}
                                        </div>

                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-xs-6 col-xs-offset-2">
                                        {!! Form::submit('ارسال پیام', ['class'=>'btn send_message_btn', 'tabindex'=>'5']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
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