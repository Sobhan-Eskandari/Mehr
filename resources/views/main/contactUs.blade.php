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
    {{ route('contactUs') }}
@endsection

@section('contactActive')
    active
@endsection

@section('content')

<div  style="display: none" class="carousel slide"  id="featured">
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
<br>
<!--EmailBox(start)-->
<div class="box_card_email">

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