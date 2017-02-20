@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | ساخت مشتری
@endsection

@section('js2')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
    <script src="../../js/state-city.js"></script>

    <style>
        .form-group{
            /*removing verical space*/
            margin-bottom : 5px !important;
        }
    </style>
@endsection

{{--@section('pms')--}}
    {{--../css/pms.css--}}
{{--@endsection--}}

@section('bootstrap_select')
    ../css/bootstrap-select.css
@endsection

@section('css')
    ../css/makeUser.css
@endsection


@section('sidebar')
    ../css/sidebar.css
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['method'=>'POST', 'action'=>'UserController@store']) !!}
        <div class="padding_right">

            <div class="row">
                <div class="col-xs-12">
                    <h4 class="makeUser_title">مشتری خود را ایجاد کنید</h4>
                </div>
            </div>
            <div class="row user_info_row">
                <!------first row button & input-------->
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('social_security_number', 'کد ملی', ['class' => 'name_label']) !!}
                        {!! Form::text('social_security_number', null, ['class'=>'form-control inputCode', 'id'=>'inputCode', 'tabindex'=>'3']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('last_name', 'نام خانوادگی', ['class' => 'name_label']) !!}
                        {!! Form::text('last_name', null, ['class'=>'form-control inputFamily', 'id'=>'inputFamily', 'tabindex'=>'2']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('first_name', 'نام', ['class' => 'name_label']) !!}
                        {!! Form::text('first_name', null, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1']) !!}
                    </div>
                </div>
            </div>

            {{--<br>--}}

            <!------second row button & input------->

            <div class="row shop_info_row">
                <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-11  level_choose_btn">
                    <div class="row">
                        {!! Form::label('role', 'نوع مشتری', ['class'=>'kind_label']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('role', array(0 => 'مشتری', 1 => 'صاحب فروشگاه'), 0, ['class'=>'selectpicker', 'tabindex'=>'6']) !!}
                    </div>
                </div>


                <div class="col-md-3 col-md-offset-1 col-xs-5  level_choose_btn">
                    <div class="row">
                        {!! Form::label('education', 'تحصیلات', ['class'=>'kind_label']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('education', array(0 => 'انتخاب کنید', 'بی سواد' => 'بی سواد', 'زیر دیپلم' => 'زیر دیپلم', 'دیپلم' => 'دیپلم', 'کاردانی' => 'کاردانی', 'کارشناسی' => 'کارشناسی', 'کارشناسی ارشد' => 'کارشناسی ارشد', 'دکترا' => 'دکترا', 'دکترا به بالا' => 'دکترا به بالا'), 0, ['class'=>'selectpicker', 'tabindex'=>'5','data-live-search'=>'true']) !!}
                    </div>
                </div>

                <div class="col-md-3 col-md-offset-1 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('occupation', 'شغل', ['class' => 'name_label']) !!}
                        {!! Form::text('occupation', null, ['class'=>'form-control inputJob', 'id'=>'inputJob', 'tabindex'=>'4']) !!}
                    </div>
                </div>
            </div>

            <hr>

            <div class="row shop_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('zip', 'کد پستی', ['class' => 'name_label']) !!}
                        {!! Form::text('zip', null, ['class'=>'form-control inputCodePost', 'id'=>'inputCodePost', 'tabindex'=>'9']) !!}
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 col-md-offset-0 col-xs-5  input_box_user level_choose_btn">
                    <div class="row">
                        {!! Form::label('city', 'شهرستان', ['class'=>'kind_label']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('city',
                            ["آستارا"=>"آستارا","آستانه اشرفیه"=>"آستانه اشرفیه","املش"=>"املش","بندر انزلی"=>"بندر انزلی","رشت"=>"رشت","رضوانشهر"=>"رضوانشهر","رودبار"=>"رودبار","رودسر"=>"رودسر","سیاهکل"=>"سیاهکل","شفت"=>"شفت","صومعه‌سرا"=>"صومعه‌سرا","طوالش"=>"طوالش","فومن"=>"فومن","لاهیجان"=>"لاهیجان","لنگرود"=>"لنگرود","ماسال"=>"ماسال"]
                            , "بندر انزلی", ['class'=>'btn_choose', 'tabindex'=>'8','data-live-search'=>'true']) !!}
                    </div>
                </div>

                <div class="col-md-3 col-md-offset-0 col-xs-5  input_box_user level_choose_btn province_btn">
                    <div class="row">
                        {!! Form::label('state', 'استان', ['class'=>'kind_label']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('state', $states, "گیلان", ['class'=>'selectpicker', 'tabindex'=>'7','data-live-search'=>'true']) !!}
                    </div>
                </div>

            </div>

            {{--<br>--}}
            <div class="row shop_info_row">
                <div class="col-xs-6">&nbsp;</div>
                <div class="col-md-6 col-md-offset-0 col-xs-12 input_box_shop pull-left address_box">
                    <div class="form-group">
                        {!! Form::label('address', 'نشانی', ['class' => 'name_label']) !!}
                        {!! Form::text('address', null, ['class'=>'form-control inputAddress', 'id'=>'inputAddress', 'tabindex'=>'10']) !!}
                    </div>
                </div>
            </div>

            <hr>

            <div class="row user_info_row">
                <!------3rd row button & input-------->
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">

                    <div class="form-group">
                        {!! Form::label('cell_2', 'موبایل 2', ['class' => 'name_label']) !!}
                        {!! Form::text('cell_2', null, ['class'=>'form-control inputMobile', 'id'=>'inputMobile', 'tabindex'=>'13']) !!}
                    </div>


                </div>
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('cell_1', 'موبایل 1', ['class' => 'name_label']) !!}
                        {!! Form::text('cell_1', null, ['class'=>'form-control inputMobile', 'id'=>'inputMobile', 'tabindex'=>'12']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('home_tel', 'تلفن منزل', ['class' => 'name_label']) !!}
                        {!! Form::text('home_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'11']) !!}
                    </div>
                </div>
            </div>
            {{--<br> --}}

            <div class="row user_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    &nbsp;
                </div>
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('emergency_tel', 'تلفن تماس ضروری', ['class' => 'name_label']) !!}
                        {!! Form::text('emergency_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'15']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('work_tel', 'تلفن محل کار', ['class' => 'name_label']) !!}
                        {!! Form::text('work_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'14']) !!}
                    </div>
                </div>
            </div>
            {{--<br>--}}
            <div class="row user_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    &nbsp;
                </div>
                <div class="col-md-8 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('email', 'ایمیل', ['class' => 'name_label']) !!}
                        {!! Form::text('email', null, ['class'=>'form-control inputEmail', 'id'=>'inputEmail', 'tabindex'=>'16']) !!}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row user_info_row">
                <div class="col-md-3 col-md-offset-1 col-xs-5  input_box_user name_bank_btn">

                    <div class="row">
                        {!! Form::label('bank_name', 'نام بانک', ['class'=>'kind_label']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('bank_name', $banks, 0, ['class'=>'selectpicker', 'tabindex'=>'19','data-live-search'=>'true']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('bank_account_number', 'شماره حساب', ['class' => 'name_label']) !!}
                        {!! Form::text('bank_account_number', null, ['class'=>'form-control inputAccountBank', 'id'=>'inputAccountBank', 'tabindex'=>'18']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('bank_card_number', 'شماره کارت', ['class' => 'name_label']) !!}
                        {!! Form::text('bank_card_number', null, ['class'=>'form-control inputAccountBank', 'id'=>'inputAccountBank', 'tabindex'=>'17']) !!}
                    </div>
                </div>
            </div>
            {{--<br>--}}
            <div class="row user_info_row">
                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'تأیید رمز عبور', ['class'=>'name_label']) !!}
                        {!! Form::password('password_confirmation', ['class'=>'form-control inputPass', 'id'=>'inputPass', 'tabindex'=>'22']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('password', 'رمز عبور', ['class'=>'name_label']) !!}
                        {!! Form::password('password', ['class'=>'form-control inputPass', 'id'=>'inputPass', 'tabindex'=>'21']) !!}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('zhenic_card_number', 'شماره ژنیک کارت', ['class' => 'name_label']) !!}
                        {!! Form::text('zhenic_card_number', null, ['class'=>'form-control inputAccountBank', 'id'=>'inputAccountBank', 'tabindex'=>'20']) !!}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row user_info_row">
                <div class="col-md-3 col-md-offset-0 col-xs-5  input_box_user name_bank_btn">
                    <div class="row">
                        {!! Form::label('reg_type', 'نوع عضویت', ['class'=>'kind_label']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('reg_type', array(''=>'یک نوع انتخاب کنید') + $regTypes , null, ['class'=>'selectpicker', 'tabindex'=>'25','data-live-search'=>'true']) !!}
                    </div>
                </div>
                <div class="col-xs-1">&nbsp;</div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        <div class="btn-group">
                            {!! Form::label('marketer', 'بازاریاب', ['class' => 'name_label']) !!}
                            {!! Form::text('marketer', null, ['class'=>'form-control inputSearch nav_up', 'id'=>'inputSearch', 'tabindex'=>'24']) !!}
                            <a href="{{route('searchMarketer')}}" target="_blank" class="btn search_nav"><span class="glyphicon glyphicon-search"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                    <div class="form-group">
                        {!! Form::label('acquainted_by', 'معرف', ['class' => 'name_label']) !!}
                        {!! Form::text('acquainted_by', null, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'23']) !!}
                    </div>
                </div>
            </div>

            <div class="row user_info_row">
                <div class="col-md-9">&nbsp;</div>
                <div class="col-md-3 col-md-offset-0 col-xs-5  input_box_user name_bank_btn choose_category">

                    <div class="row">
                        {!! Form::label('categories', 'دسته بندی', ['class'=>'kind_label']) !!}
                    </div>
                    <div class="row dropdown">
                        {!! Form::select('categories[]', $categories, null, ['class'=>'selectpicker', 'id'=>'done', 'multiple data-done-button'=>'true', 'tabindex'=>'26','data-live-search'=>'true']) !!}
                    </div>
                </div>
            </div>

            <hr>

            <!--------comment------->

            <div class="row user_info_row">
                <div class="col-xs-5"></div>
                <div class="col-xs-7 comment_box">
                    <h4>{!! Form::label('text', 'توضیحات') !!}</h4>
                    {!! Form::textarea('text', null,['class'=>'form-control', 'id'=>'comment', 'rows'=>5, 'tabindex'=>'27']) !!}
                    <script>
                        CKEDITOR.replace( 'text' );
                    </script>
                </div>
            </div>

            <!--------submit button------->

            <div class="row">
                <div class="col-xs-12">
                    {!! Form::submit('ایجاد مشتری', ['class'=>'btn makeUser_btn', 'tabindex'=>'28']) !!}
                </div>
            </div>

        </div>
    {!! Form::close() !!}

@endsection

@section('customers')
    active
@endsection

@section('js')
    <script src="../js/jquery-2.1.4.min.js"></script>
    {{--<script src="../js/bootstrap.min.js"></script>--}}
    <script src="../js/managementAddShop.js"></script>
    <script src="../js/state-city.js"></script>
@endsection