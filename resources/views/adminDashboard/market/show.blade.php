@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | نمایش فروشگاه
@endsection

@section('js2')
    {{--<script src="../../../js/jquery-2.1.4.min.js"></script>--}}
    {{--<script src="../../../js/bootstrap-select.min.js"></script>--}}
    {{--<link type="text/css" rel="stylesheet" href="../../../css/persianDatepicker-default.css" />--}}
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">--}}
    {{--<script src="../../../js/state-city.js"></script>--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../../css/persianDatepicker-default.css" />
    <script src="../../js/state-city.js"></script>

    {{--<script src="../js/state-city.js"></script>--}}
@endsection

@section('pms')
../../css/pms.css
@endsection

@section('css')
    ../../css/makeShop.css
@endsection

@section('bootstrap_select')
    ../../css/bootstrap-select.css
@endsection

@section('content')

    <!--------specification of shops-------->

    {!! Form::model($market,['method'=>'PATCH','action'=>['marketController@update',$market->id],'files'=> true]) !!}

    <div class="padding_right">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="specification_title">مشخصات فروشگاه</h4>
            </div>
        </div>



        <!-------------first row------------->

        <div class="row shop_info_row">
            <div class="col-md-4 col-md-offset-0 col-xs-5 col-xs-offset-8">

            </div>

            @if($user)
                <div class="col-md-4 col-md-offset-0 col-xs-12 col-xs-offset-1">
                    <div class="form-group">

                        {!! Form::label('نام فروشگاه', null, ['class' => 'name_shop']) !!}
                        {!! Form::text('market_name',null,['class'=>'form-control inpuColXs4 name_shop','id'=>'inpuColXs4','tabindex'=>'1','readonly']) !!}

                    </div>
                </div>
            @endif
            <div class="col-md-4 col-md-offset-0 col-xs-12">
                <div class="form-group">
                    {!! Form::label('مالک :', null, ['class' => 'name_shop']) !!}&nbsp;{{$user->first_name}}{{$user->last_name}}
                    {!! Form::text('user_id',$user->id,['class'=>'form-control inpuColXs4 height_eq_btn','id'=>'inpuColXs4','tabindex'=>'2','readonly']) !!}

                    {{--<input class="form-control inpuColXs4 height_eq_btn" type="text" id="inpuColXs4" tabindex="1">--}}

                    {{--<a href="{{route('searchSellerEdit',$market->id)}}"   class="btn search_btn pull-left">--}}
                        {{--<span class="glyphicon glyphicon-search"></span>--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>
        <!------------------------------------>
        @if($user)
            <div class="row shop_info_row">
                <div class="col-xs-12">
                    {!! Form::label('کد دستگاه پوز را وارد کنید(دستگاه را با علامت","از هم جدا کنی)', null, ['class' => 'control-label']) !!}
                    {!! Form::text('pos',null,['class'=>'form-control inpuColXs4 height_eq_btn','id'=>'inputColXs12','tabindex'=>'3','readonly']) !!}

                    {{--<input class="form-control inputColXs12 height_eq_btn" type="text" id="inputColXs12" tabindex="1">--}}
                </div>
            </div>


            <hr class="seprate_section_hr">

            <!------------------------------------>

            <div class="row  shop_info_row second_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12 col-xs-offset-2">
                    <div class="form-group">
                        {!! Form::label('کد پستی', null, ['class' => 'code_post_title']) !!}
                        {!! Form::text('zip',null,['class'=>'form-control inpuColXs4 cede_post','id'=>'inpuColXs4','tabindex'=>'4','readonly']) !!}

                        {{--<input class="form-control inpuColXs4 cede_post" type="text" id="inpuColXs4" tabindex="1">--}}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-6 s_city_btn">
                    <div class="row">
                        {!! Form::label('city', 'شهرستان', ['class'=>'kind_label']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::text('city', null , ['class'=>'form-control inpuColXs4', 'tabindex'=>'5','readonly']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-6 pull-right">
                    <div class="row">
                        {!! Form::label('state', 'استان', ['class'=>'country_side']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::text('state', null, ['class'=>'form-control inpuColXs4', 'tabindex'=>'6','readonly']) !!}
                    </div>
                </div>
            </div>



            <!------second row button------->
            <div class="row second_row_upper">


                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_shop pull-left">
                    <div class="form-group">
                        {!! Form::label('market_tel', 'تلفن فروشگاه', ['class' => 'name_label']) !!}
                        {!! Form::text('market_tel', null, ['class'=>'form-control inputShoTell', 'id'=>'inputShopTell', 'tabindex'=>'8','readonly']) !!}
                    </div>
                </div>

                <div class="col-md-8 col-md-offset-0 col-xs-12 input_box_shop pull-right">
                    <div class="form-group">
                        {!! Form::label('address', 'آدرس فروشگاه', ['class' => 'name_label']) !!}
                        {!! Form::text('address',null,['class'=>'form-control inputShopAddress','id'=>'inputShopAddress','tabindex'=>'7','readonly']) !!}
                    </div>
                </div>
            </div>

            {{--<br>--}}
            <br>

            <div class="row">
                <div class="col-xs-12">
                    <h4 class="title_address_shop">فروشگاه را روی نقشه مشخص کنید :</h4>
                </div>
            </div>

            <!-----google map----->
            <div class="row">

                <div class="pull-right" id="map" style="width:50%;height:400px">
                </div>
                @if(1)
                    <script>
                        //                        document.getElementById("inputWidth").val();
                        //                        document.getElementById("inputHeight").val();
                        //                        var mapCanvas = document.getElementById("map");
                        //                        var mapOptions = {
                        //                            center: new google.maps.LatLng(37.463909, 49.479862),
                        //                            zoom: 14
                        //                        };
                        // map = new google.maps.Map(mapCanvas, mapOptions);
                        $( document ).ready(function() {

                        });
                        $( document ).ready(function() {
                            var lng = {{$market->longitude}} + 0 ;
                            var lat = {{$market->latitude}} + 0 ;
                            window.showStore(lat,lng);
                        });

                    </script>
                @endif
                <div class="col-xs-5">
                    <div class="row">
                        <div class="form-group pull-right">
                            <label class="name_label">طول جغرافیایی:</label>
                            {!! Form::text('longitude',null,['class'=>'form-control inputWidth','id'=>'inputWidth','tabindex'=>'8','readonly']) !!}

                            {{--<input class="form-control inputWidth" type="text" id="inputWidth" tabindex="1"  readonly>--}}
                        </div>
                    </div>
                    {{--<button class="btn remove_btn">حذف کردن از نقشه</button>--}}

                    <div class="row">
                        <div class="form-group pull-right">
                            <label class="name_label">عرض جغرافیایی:</label>
                            {!! Form::text('latitude',null,['class'=>'form-control inputHeight','id'=>'inputHeight','tabindex'=>'9','readonly']) !!}

                            {{--<input class="form-control inputHeight" type="text" id="inputHeight" tabindex="1"  readonly>--}}
                        </div>
                    </div>

                    {{--<div class="row">&nbsp;</div>--}}
                    {{--<div class="row">--}}
                        {{--<button type="button" class="btn add_btn" id="addToMap">اضافه کردن به نقشه</button>--}}
                    {{--</div>--}}
                    {{--<br>--}}
                    {{--<div class="row">--}}


                    {{--</div>--}}
                </div>
            </div>

            <hr class="seprate_section_hr">

            <!--------------upload img------------------>

            <div class="row">
                <div class="col-xs-12">
                    <h4 class="choose_shop_second_title">تصاویر فروشگاه </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <img class="shop_img" src="../marketsPhotos/{{$market->photos[0]->address}}" width="30%" height="200px">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <img class="shop_img" src="../marketsPhotos/{{$market->photos[1]->address}}" width="30%" height="200px">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <img class="shop_img" src="../marketsPhotos/{{$market->photos[2]->address}}" width="30%" height="200px">
                </div>
            </div>

            {{--<br>--}}
            <br>

            <div class="row">
                <div class="col-xs-12">
                    <h4 class="choose_shop_second_title">لوگوی فروشگاه</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                            <img class="shop_img" src="../marketsPhotos/{{$market->logo->address}}" width="30%" height="200px">
                        </div>
                    </div>
                </div>
            </div>


            <hr class="seprate_section_hr">

            <!-------------------------------------->

            <div class="row  shop_info_row second_row">
                <div class="col-md-9 col-md-offset-0 col-xs-5">&nbsp;</div>
                <div class="row">
                    <label>دسته بندی ها</label>
                </div>
                <div class="row dropdown">
                    {!! Form::text('marketsCategories',$mategoryName,['class'=>'form-control inpuColXs4','multiple','tabindex' =>'1','data-live-search'=>'true','readonly']) !!}

                </div>
                <div class="col-md-3 col-md-offset-0 col-xs-5 pull-right">

                </div>
            </div>

            <!--------------------------------------------->

            <div class="row  shop_info_row second_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12 col-xs-offset-2">
                    <div class="form-group">
                        <label class="code_post_title">درصد تخفیف</label>
                        {!! Form::text('normal_percentage',null,['class'=>'form-control inpuColXs4 cede_post','id'=>'inpuColXs4','tabindex'=>'15','readonly']) !!}

                        {{--<input class="form-control inpuColXs4 cede_post" type="text" id="inpuColXs4" tabindex="1">--}}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-6 kind_shop">

                    <div class="row">
                        <label class="country_side">نوع فروشگاه</label>
                    </div>
                    <div class="row dropdown">
                        {!! Form::text('market_type',      $market->market_type = 1 ? 'ویژه' : 'معمولی',['class'=>'form-control inpuColXs4','tabindex' =>'16','readonly']) !!}

                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-6 pull-right">
                    {{--<div class="row">--}}
                        {{--<label>تگ های جدید(تگ ها را با علامت "," جدا کنید)</label>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--{!! Form::text('newTags',null,['class'=>'form-control inpuColXs4 cede_post','id'=>'inpuColXs4','tabindex'=>'17']) !!}--}}

                    {{--</div>--}}
                    <div class="row">
                        <label>تگ ها</label>
                    </div>
                    <div class="row dropdown">
                        {!! Form::text('tags',$TagName,['class'=>'selectpicker','multiple','tabindex' =>'18','data-live-search'=>'true','class' =>'form-control inputSpecial_form','readonly']) !!}

                        {{--<select class="selectpicker">--}}
                        {{--<option>Mustard</option>--}}
                        {{--<option>Ketchup</option>--}}
                        {{--<option>Relish</option>--}}
                        {{--</select>--}}
                    </div>
                </div>
            </div>


            <!------------------------------------------------->


            <div class="row  shop_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تاریخ پایان تخفیف ویژه</label>
                        {!! Form::text('special_percentage_end',null , array('id' => 'datepicker5','readonly'=>'true','class'=>'form-control inputSpecial_form','tabindex' =>'19')) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تاریخ شروع تخفیف ویژه</label>
                        {!! Form::text('special_percentage_start',null , array('id' => 'datepicker4','readonly'=>'true','class'=>'form-control inputSpecial_form','tabindex' =>'20')) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تخفیف ویژه</label>
                        {!! Form::text('special_percentage',null , array('id' => 'inputSpecial','readonly'=>'true','class'=>'form-control inputSpecial_form','tabindex' =>'21')) !!}
                    </div>
                </div>
            </div>

            <!-------------------------------------------------->

            <div class="row  shop_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-5">&nbsp;</div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تاریخ پایان قرار داد</label>
                        {!! Form::text('contract_end', null , array('id' => 'datepicker3','readonly'=>'true','class'=>'form-control inputSpecial_form','tabindex' =>'22')) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تاریخ شروع قرارداد</label>
                        {!! Form::text('contract_start',null , array('id' => 'datepicker2','readonly'=>'true','class'=>'form-control inputSpecial_form','tabindex' =>'23')) !!}
                    </div>
                </div>
            </div>

            <hr class="seprate_section_hr">

            <!------------------------------------------>
            <div class="row  shop_info_row second_row">
                <div class="col-md-9 col-md-offset-0 col-xs-5">&nbsp;</div>

                <div class="col-md-3 col-md-offset-0 col-xs-5 pull-right">
                    <div class="row">
                        <label>دسته بندی سیستمی:</label>
                    </div>
                    <div class="row dropdown">
                        {!! Form::text('categories',$categoryName,['class'=>'selectpicker','multiple','tabindex' =>'24','data-live-search'=>'true','class' =>'form-control','readonly'=>'true']) !!}

                    </div>
                </div>
            </div>

            <!-------------------------------->
            <div class="row shop_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-5 col-xs-offset-7">
                    <div class="row">
                        <label class="kind_btn_last">نوع عضویت</label>
                    </div>
                    <div class="row dropdown">
                        {!! Form::text('regType',$regName,['class'=>'selectpicker','tabindex' =>'25','data-live-search'=>'true','class' =>'form-control inputSpecial_form','readonly']) !!}

                    </div>
                </div>


                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>معرف</label>
                        {!! Form::text('acquainted_by',null,['class'=>'form-control inpuColXs4','id'=>'inpuColXs4','tabindex'=>'26','readonly']) !!}

                        {{--<input class="form-control inpuColXs4" type="text" id="inpuColXs4" tabindex="1">--}}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">

                        <label>بازار یاب</label>
                        {!! Form::text('marketer',null,['class'=>'form-control inpuColXs4 height_eq_btn','id'=>'inpuColXs4','tabindex'=>'27','readonly']) !!}

                        {{--<input class="form-control inpuColXs4 height_eq_btn" type="text" id="inpuColXs4" tabindex="1">--}}

                        {{--<a href="{{route('searchMarketer')}}" target="_blank" class="btn search_btn pull-left">--}}
                            {{--<span class="glyphicon glyphicon-search"></span>--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>

            <!----------------------------------------->

            <hr class="seprate_section_hr">

            <div class="row  shop_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>امتیاز خرید</label>
                        {!! Form::text('point',null, array('id' => 'inputSpecial','class'=>'form-control inputSpecial first_one','tabindex' =>'28','readonly')) !!}

                        {{--<input class="form-control inputSpecial first_one" type="text" id="inputSpecial" tabindex="1">--}}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('تاریخ شروع', null, ['class' => 'control-label']) !!}
                        {!! Form::text('start',null, array('id' => 'datepicker1','readonly'=>'true','class'=>'form-control inputSpecial_form','tabindex' =>'29')) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12" onscroll="myFunction()">
                    <div class="form-group">
                        {!! Form::label('تاریخ پایان', null, ['class' => 'control-label']) !!}
                        {!! Form::text('end',null, array('id' => 'datepicker','readonly'=>'true','class'=>'form-control inputSpecial_form','tabindex' =>'30')) !!}
                    </div>
                </div>
            </div>

            <hr class="seprate_section_hr">

            {{--<br>--}}

            <div class="row">
                <div class="col-xs-12">
                    <h4>توضیحات</h4>
                </div>
            </div>

            <!---------comment input-------------->

            <div class="row">
                <div class="col-xs-8 padding_inputComments pull-right">
                    <div class="form-group">

                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                                <textarea id="news_text">{{ $market->text }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12" id="news_text_show">
                                <textarea>{{$market->text}}</textarea>
                            </div>
                        </div>

                        <script>
                            $( document ).ready(function() {
                                $('#news_text_show').html($('#news_text').text());
                                $('#news_text').css("display","none")
                            });
                        </script>

                    </div>

                </div>
            </div>


            <!------------record button------------>
            {{--<br>--}}
            <br>
            {{--<div class="row">--}}
                {{--<div class="col-xs-12 padding_record_btn">--}}
                    {{--{!! Form::submit('ثبت فروشگاه ',['class'=>'btn record_btn','tabindex' =>'32']) !!}--}}
                    {{--<button class="btn record_btn"></button>--}}
                {{--</div>--}}
            {{--</div>--}}
        @endif

    </div>

    {!! Form::close() !!}


@endsection


@section('markets')
    active
@endsection
@section('js')
    {{--<script src="../../../js/jquery-2.1.4.min.js"></script>--}}
    {{--<script src="../../../js/bootstrap.min.js"></script>--}}
    {{--<script src="../../../js/managementAddShop.js"></script>--}}
    {{--<script src="../js/state-city.js"></script>--}}
    {{--<script src="//code.jquery.com/jquery-1.10.2.js"></script>--}}
    {{--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>--}}
    {{--<script type="text/javascript" src="../../../js/persianDatepicker.min.js"></script>--}}

    {{--<script src="../../../js/map.js"></script>--}}
    {{--<script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyD8ClNTU8WBKdBG8qwgaCZA5fHjWitwV-M &callback=myMap">--}}
    {{--</script>--}}


    <script type="text/javascript" src="../../../js/persianDatepicker.min.js"></script>

    <script src="../../../js/showStore.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyD8ClNTU8WBKdBG8qwgaCZA5fHjWitwV-M &callback=showStore">
    </script>

    <script src="../js/jquery-2.1.4.min.js"></script>
    {{--<script src="../js/bootstrap.min.js"></script>--}}
    <script src="../../../js/managementAddShop.js"></script>
    <script src="../../../js/state-city.js"></script>


    <script>
        $(function() {
            $("#datepicker").persianDatepicker();
        });
        $(function() {
            $("#datepicker1").persianDatepicker();
        });
        $(function() {
            $("#datepicker2").persianDatepicker();
        });
        $(function() {
            $("#datepicker3").persianDatepicker();
        });
        $(function() {
            $("#datepicker4").persianDatepicker();
        });
        $(function() {
            $("#datepicker5").persianDatepicker();
        });
    </script>



@endsection