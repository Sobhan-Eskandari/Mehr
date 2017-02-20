@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | ایجاد فروشگاه
@endsection

@section('js2')
    {{--<link type="text/css" rel="stylesheet" href="../../css/bootstrap.css">--}}
    {{--<link type="text/css" rel="stylesheet" href="../../css/bootstrap-select.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{--<script src="../../js/jquery-2.1.4.min.js"></script>--}}
    {{--<script src="../../js/bootstrap.min.js"></script>--}}
    {{--<script src="../../js/bootstrap-select.min.js"></script>--}}
    <link type="text/css" rel="stylesheet" href="../../css/persianDatepicker-default.css" />
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">--}}
    {{--<script src="../../js/state-city.js"></script>--}}

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

    {!! Form::open(['method'=>'POST','action'=>'marketController@store','files'=> true]) !!}

    <div class="padding_right">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="specification_title">مشخصات فروشگاه</h4>
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>

                            @endforeach
                        </ul>
                    @endif
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
                        {!! Form::text('market_name',null,['class'=>'form-control inpuColXs4 name_shop','id'=>'inpuColXs4','tabindex'=>'2']) !!}

                    </div>
                </div>
                @endif
                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('مالک :', null, ['class' => 'name_shop']) !!}&nbsp;{{$user->first_name}}{{$user->last_name}}
                        {!! Form::text('user_id',$user->id,['class'=>'form-control inpuColXs4 height_eq_btn','id'=>'inpuColXs4','tabindex'=>'1','readonly']) !!}

                        <a href="{{route('searchSeller')}}"   class="btn search_btn pull-left">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!------------------------------------>
            @if($user)
            <div class="row shop_info_row">
                <div class="col-xs-12">
                    {!! Form::label('کد دستگاه پوز را وارد کنید(دستگاه را با علامت","از هم جدا کنی)', null, ['class' => 'control-label']) !!}
                    {!! Form::text('pos',null,['class'=>'form-control inpuColXs4 height_eq_btn','id'=>'inputColXs12','tabindex'=>'3']) !!}

                </div>
            </div>


            <hr class="seprate_section_hr">

            <!------------------------------------>

            <div class="row  shop_info_row second_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12 col-xs-offset-2">
                    <div class="form-group">
                        {!! Form::label('کد پستی', null, ['class' => 'code_post_title']) !!}
                        {!! Form::text('zip',null,['class'=>'form-control inpuColXs4 cede_post','id'=>'inpuColXs4','tabindex'=>'6']) !!}

                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-6 s_city_btn">
                    <div class="row">
                        {!! Form::label('city', 'شهرستان', ['class'=>'kind_label']) !!}
                    </div>
                    {!! Form::select('city',
                        ["آستارا"=>"آستارا","آستانه اشرفیه"=>"آستانه اشرفیه","املش"=>"املش","بندر انزلی"=>"بندر انزلی","رشت"=>"رشت","رضوانشهر"=>"رضوانشهر","رودبار"=>"رودبار","رودسر"=>"رودسر","سیاهکل"=>"سیاهکل","شفت"=>"شفت","صومعه‌سرا"=>"صومعه‌سرا","طوالش"=>"طوالش","فومن"=>"فومن","لاهیجان"=>"لاهیجان","لنگرود"=>"لنگرود","ماسال"=>"ماسال"]
                        , "بندر انزلی", ['class'=>'btn_choose', 'tabindex'=>'5','data-live-search'=>'true']) !!}
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-6 pull-right">
                    <div class="row">
                        {!! Form::label('state', 'استان', ['class'=>'country_side']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('state', $states, "گیلان", ['class'=>'selectpicker', 'tabindex'=>'4']) !!}
                    </div>

                </div>
            </div>



            <!------second row button------->
            <div class="row second_row_upper">


                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_shop pull-left">
                    <div class="form-group">
                        {!! Form::label('market_tel', 'تلفن فروشگاه', ['class' => 'name_label']) !!}
                        {!! Form::text('market_tel', null, ['class'=>'form-control inputShoTell', 'id'=>'inputShopTell', 'tabindex'=>'8']) !!}
                    </div>
                </div>

                <div class="col-md-8 col-md-offset-0 col-xs-12 input_box_shop pull-right">
                    <div class="form-group">
                        {!! Form::label('address', 'آدرس فروشگاه', ['class' => 'name_label']) !!}
                        {!! Form::text('address',null,['class'=>'form-control inputShopAddress','id'=>'inputShopAddress','tabindex'=>'7']) !!}
                    </div>
                </div>
            </div>

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

                <div class="col-xs-5">
                    <div class="row">
                        <div class="form-group pull-right">
                            <label class="name_label">طول جغرافیایی:</label>
                            {!! Form::text('longitude',null,['class'=>'form-control inputWidth','id'=>'inputWidth','readonly', 'tabindex'=>'9']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group pull-right">
                            <label class="name_label">عرض جغرافیایی:</label>
                            {!! Form::text('latitude',null,['class'=>'form-control inputHeight','id'=>'inputHeight', 'readonly', 'tabindex'=>'10']) !!}
                        </div>
                    </div>

                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <button type="button" class="btn add_btn" id="addToMap" tabindex = "11">اضافه کردن به نقشه</button>
                    </div>
                    <br>
                    <div class="row">
                        {{--<button class="btn remove_btn">حذف کردن از نقشه</button>--}}
                    </div>
                </div>
            </div>

            <hr class="seprate_section_hr">

            <!--------------upload img------------------>

            <div class="row">
                <div class="col-xs-12">
                    <h4 class="choose_shop_second_title">تصاویر فروشگاه را انتخاب کنید:</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-md-offset-0 col-xs-5">
                    <label class="btn btn-default btn-file upload_btn">
                        انتخاب فایل
                        {!! Form::file('img1',['id'=>'storeimg_uploadbtn_1','style'=>'display: none', 'tabindex'=>'12']) !!}

                    </label>

                </div>
                <div class="col-md-8 col-md-offset-1 col-xs-7 input_img_padding">
                    <input class="form-control upload_long_btn" type="text" id="store_img1" readonly>
                </div>
            </div>

            {{--<br>--}}

            <div class="row">
                <div class="col-md-3 col-md-offset-0 col-xs-5">
                    <label class="btn btn-default btn-file upload_btn">
                        انتخاب فایل
                        {!! Form::file('img2',['id'=>'storeimg_uploadbtn_2','style'=>'display: none', 'tabindex'=>'13']) !!}

                    </label>

                </div>
                <div class="col-md-8 col-md-offset-1 col-xs-7 input_img_padding">
                    <input class="form-control upload_long_btn" type="text" id="store_img2" readonly>
                </div>
            </div>
            {{--<br>--}}

            <div class="row">
                <div class="col-md-3 col-md-offset-0 col-xs-5">
                    <label class="btn btn-default btn-file upload_btn">
                        انتخاب فایل
                        {!! Form::file('img3',['id'=>'storeimg_uploadbtn_3','style'=>'display: none', 'tabindex'=>'14']) !!}

                    </label>

                </div>
                <div class="col-md-8 col-md-offset-1 col-xs-7 input_img_padding">
                    <input class="form-control upload_long_btn" type="text" id="store_img3" readonly>
                </div>
            </div>

            <br>
            {{--<br>--}}

            <div class="row">
                <div class="col-xs-12">
                    <h4 class="choose_shop_second_title">لوگوی فروشگاه را انتخاب کنید:</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-md-offset-0 col-xs-5">
                    <label class="btn btn-default btn-file upload_btn">
                        انتخاب فایل
                        {!! Form::file('logo',['id'=>'storelogo_uploadbtn','style'=>'display: none', 'tabindex'=>'15']) !!}

                    </label>

                </div>
                <div class="col-md-8 col-md-offset-1 col-xs-7 input_img_padding">
                    <input class="form-control upload_long_btn" type="text" id="logo_img" readonly>
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
                    {!! Form::select('marketsCategories[]', $marketCategories , null,['class'=>'selectpicker','multiple',"tabindex"=>"16",'data-live-search'=>'true']) !!}

                </div>
                <div class="col-md-3 col-md-offset-0 col-xs-5 pull-right">

                </div>
            </div>

            <!--------------------------------------------->

            <div class="row  shop_info_row second_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12 col-xs-offset-2">
                    <div class="form-group">
                        <label class="code_post_title">درصد تخفیف</label>
                        {!! Form::text('normal_percentage',null,['class'=>'form-control inpuColXs4 cede_post','id'=>'inpuColXs4','tabindex'=>'19']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-6 kind_shop">

                    <div class="row">
                        <label class="country_side">نوع فروشگاه</label>
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('market_type', ['0'=>'معمولی','1'=>'ویژه'], null,['class'=>'selectpicker',"tabindex"=>"18"]) !!}

                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-6 pull-right">
                    <div class="row">
                        <label>تگ های جدید(تگ ها را با علامت "," جدا کنید)</label>
                    </div>
                    <div class="row">
                        {!! Form::text('newTags',null,['class'=>'form-control inpuColXs4','id'=>'inpuColXs4','tabindex'=>'17']) !!}

                    </div>

                    <br>
                    <div class="row">
                        <label>تگ ها</label>
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('tags[]', $tags, null,['class'=>'selectpicker','multiple',"tabindex"=>"20",'data-live-search'=>'true']) !!}

                    </div>
                </div>
            </div>


            <!------------------------------------------------->


            <div class="row  shop_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تاریخ پایان تخفیف ویژه</label>
                        {!! Form::text('special_percentage_end',null , array('id' => 'datepicker5','readonly'=>'true','class'=>'form-control inputSpecial_form',"tabindex"=>"23")) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تاریخ شروع تخفیف ویژه</label>
                        {!! Form::text('special_percentage_start',null , array('id' => 'datepicker4','readonly'=>'true','class'=>'form-control inputSpecial_form',"tabindex"=>"22")) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تخفیف ویژه</label>
                        {!! Form::text('special_percentage',null , array('id' => 'inputSpecial','class'=>'form-control inputSpecial',"tabindex"=>"21")) !!}
                    </div>
                </div>
            </div>

            <!-------------------------------------------------->

            <div class="row  shop_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-5">&nbsp;</div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تاریخ پایان قرار داد</label>
                        {!! Form::text('contract_end', null , array('id' => 'datepicker3','readonly'=>'true','class'=>'form-control inputSpecial_form',"tabindex"=>"25")) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>تاریخ شروع قرارداد</label>
                        {!! Form::text('contract_start',null , array('id' => 'datepicker2','readonly'=>'true','class'=>'form-control inputSpecial_form',"tabindex"=>"24")) !!}
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
                        {!! Form::select('categories[]',$systemicCategories, null,['class'=>'selectpicker','multiple',"tabindex"=>"26",'data-live-search'=>'true']) !!}

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
                        {!! Form::select('regType',['0'=>'انتخاب کنید'] + $regTypes, null,['class'=>'selectpicker',"tabindex"=>"29",'data-live-search'=>'true']) !!}

                    </div>
                </div>


                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>معرف</label>
                        {!! Form::text('acquainted_by',null,['class'=>'form-control inpuColXs4','id'=>'inpuColXs4','tabindex'=>'28']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">

                        <label>بازار یاب</label>
                        {!! Form::text('marketer',null,['class'=>'form-control inpuColXs4 height_eq_btn','id'=>'inpuColXs4','tabindex'=>'27']) !!}

                        <a href="{{route('searchMarketer')}}" target="_blank" class="btn search_btn pull-left">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!----------------------------------------->

            <hr class="seprate_section_hr">

            <div class="row  shop_info_row">

                <div class="col-md-4 col-md-offset-0 col-xs-12" onscroll="myFunction()">
                    <div class="form-group">
                        {!! Form::label('تاریخ پایان', null, ['class' => 'control-label']) !!}
                        {!! Form::text('end',null, array('id' => 'datepicker','readonly'=>'true','class'=>'form-control inputSpecial_form',"tabindex"=>"31")) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('تاریخ شروع', null, ['class' => 'control-label']) !!}
                        {!! Form::text('start',null, array('id' => 'datepicker1','readonly'=>'true','class'=>'form-control inputSpecial_form',"tabindex"=>"30")) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12">
                    <div class="form-group">
                        <label>امتیاز خرید</label>
                        {!! Form::text('point',null, array('id' => 'inputSpecial','class'=>'form-control inputSpecial first_one',"tabindex"=>"32")) !!}
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
                        {!! Form::textarea('text',null,['class'=>'form-control inputComments','id'=>'inputComments','tabindex'=>'33','placeholder'=>"توضیحات خود را وارد کنید"]) !!}
                        <script>
                            CKEDITOR.replace( 'text' );
                        </script>
                    </div>
                </div>
            </div>


            <!------------record button------------>
            {{--<br>--}}
            <br>
            <div class="row">
                <div class="col-xs-12 padding_record_btn">
                    {!! Form::submit('ثبت فروشگاه ',['class'=>'btn record_btn',"tabindex"=>"34"]) !!}
                </div>
            </div>
            @endif

        </div>

        {!! Form::close() !!}


@endsection


@section('markets')
    active
@endsection
@section('js')
    {{--<script src="../../js/jquery-2.1.4.min.js"></script>--}}
    {{--<script src="../../js/bootstrap.min.js"></script>--}}
    {{--<script src="../../js/managementAddShop.js"></script>--}}
    {{--<script src="../js/state-city.js"></script>--}}
    {{--<script src="//code.jquery.com/jquery-1.10.2.js"></script>--}}
    {{--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>--}}
    <script type="text/javascript" src="../../js/persianDatepicker.min.js"></script>

    <script src="../../js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyD8ClNTU8WBKdBG8qwgaCZA5fHjWitwV-M &callback=myMap">
    </script>

    <script src="../js/jquery-2.1.4.min.js"></script>
    {{--<script src="../js/bootstrap.min.js"></script>--}}
    <script src="../../js/managementAddShop.js"></script>
    <script src="../../js/state-city.js"></script>


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