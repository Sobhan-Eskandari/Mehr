@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | نمایش مشتری
@endsection

@section('js2')
    {{--<script src="../../js/jquery-2.1.4.min.js"></script>--}}
    {{--<script src="../../js/bootstrap-select.min.js"></script>--}}
    {{--<script src="../../js/state-city.js"></script>--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
    <script src="../../js/state-city.js"></script>
@endsection

{{--@section('pms')--}}
{{--../../css/pms.css--}}
{{--@endsection--}}

@section('css')
    ../../css/makeUser.css
@endsection

@section('bootstrap_select')
    ../../css/bootstrap-select.css
@endsection

@section('sidebar')
    ../../css/sidebar.css
@endsection

@section('content')

    {!! Form::model($user , ['method'=>'PATCH', 'action'=>['UserController@update', $user->id]]) !!}
    <div class="padding_right">

        <div class="row">
            <div class="col-xs-12">
                <h4 class="makeUser_title">{{ $user->first_name }} {{ $user->last_name }}</h4>
            </div>
        </div>
        <div class="row user_info_row">
            <!------first row button & input-------->
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('social_security_number', 'کد ملی', ['class' => 'name_label']) !!}
                    {!! Form::text('social_security_number', null, ['class'=>'form-control inputCode', 'id'=>'inputCode', 'tabindex'=>'3', 'readonly']) !!}
                </div>
            </div>
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('last_name', 'نام خانوادگی', ['class' => 'name_label']) !!}
                    {!! Form::text('last_name', null, ['class'=>'form-control inputFamily', 'id'=>'inputFamily', 'tabindex'=>'2', 'readonly']) !!}
                </div>
            </div>

            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('first_name', 'نام', ['class' => 'name_label']) !!}
                    {!! Form::text('first_name', null, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1', 'readonly']) !!}
                </div>
            </div>
        </div>

        {{--<br>--}}

        <!------second row button & input------->

        <div class="row shop_info_row">
            <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-11  level_choose_btn">
                <div class="row">
                    {!! Form::label('role', 'نوع مشتری', ['class'=>'kind_label']) !!}
                    {!! Form::text('role', $user->role == 0 ? 'مشتری' : 'صاحب فروشگاه', ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1', 'readonly']) !!}
                </div>
            </div>

            <div class="col-md-3 col-md-offset-1 col-xs-5  level_choose_btn">
                <div class="row">
                    {!! Form::label('education', 'تحصیلات', ['class'=>'kind_label']) !!}
                    {!! Form::text('education', $user->education, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1', 'readonly']) !!}
                </div>
            </div>

            <div class="col-md-3 col-md-offset-1 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('occupation', 'شغل', ['class' => 'name_label']) !!}
                    {!! Form::text('occupation', null, ['class'=>'form-control inputJob', 'id'=>'inputJob', 'tabindex'=>'4', 'readonly']) !!}
                </div>
            </div>
        </div>

        <hr>

        <div class="row shop_info_row">
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('zip', 'کد پستی', ['class' => 'name_label']) !!}
                    {!! Form::text('zip', null, ['class'=>'form-control inputCodePost', 'id'=>'inputCodePost', 'tabindex'=>'9', 'readonly']) !!}
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3 col-md-offset-0 col-xs-5  input_box_user level_choose_btn">
                <div class="row">
                    {!! Form::label('city', 'شهرستان', ['class'=>'kind_label']) !!}
                    {!! Form::text('city', $user->city, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1', 'readonly']) !!}
                </div>
            </div>

            <div class="col-md-3 col-md-offset-0 col-xs-5  input_box_user level_choose_btn province_btn">
                <div class="row">
                    {!! Form::label('state', 'استان', ['class'=>'kind_label']) !!}
                    {!! Form::text('role', $user->state, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1', 'readonly']) !!}
                </div>
            </div>

        </div>

        {{--<br>--}}
        <div class="row shop_info_row">
            <div class="col-xs-6">&nbsp;</div>
            <div class="col-md-6 col-md-offset-0 col-xs-12 input_box_shop pull-left address_box">
                <div class="form-group">
                    {!! Form::label('address', 'نشانی', ['class' => 'name_label']) !!}
                    {!! Form::text('address', null, ['class'=>'form-control inputAddress', 'id'=>'inputAddress', 'tabindex'=>'10', 'readonly']) !!}
                </div>
            </div>
        </div>

        <hr>

        <div class="row user_info_row">
            <!------3rd row button & input-------->
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">

                <div class="form-group">
                    {!! Form::label('cell_2', 'موبایل 2', ['class' => 'name_label']) !!}
                    {!! Form::text('cell_2', null, ['class'=>'form-control inputMobile', 'id'=>'inputMobile', 'tabindex'=>'13', 'readonly']) !!}
                </div>


            </div>
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('cell_1', 'موبایل 1', ['class' => 'name_label']) !!}
                    {!! Form::text('cell_1', null, ['class'=>'form-control inputMobile', 'id'=>'inputMobile', 'tabindex'=>'12', 'readonly']) !!}
                </div>
            </div>

            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('home_tel', 'تلفن منزل', ['class' => 'name_label']) !!}
                    {!! Form::text('home_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'11', 'readonly']) !!}
                </div>
            </div>
        </div>
        {{--<br>--}}

        <div class="row user_info_row">
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                &nbsp;
            </div>
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('emergency_tel', 'تلفن تماس ضروری', ['class' => 'name_label']) !!}
                    {!! Form::text('emergency_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'15', 'readonly']) !!}
                </div>
            </div>

            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('work_tel', 'تلفن محل کار', ['class' => 'name_label']) !!}
                    {!! Form::text('work_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'14', 'readonly']) !!}
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
                    {!! Form::text('email', null, ['class'=>'form-control inputEmail', 'id'=>'inputEmail', 'tabindex'=>'16', 'readonly']) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="row user_info_row">
            <div class="col-md-3 col-md-offset-1 col-xs-5  input_box_user name_bank_btn">

                <div class="row">
                    {!! Form::label('bank_name', 'نام بانک', ['class'=>'kind_label']) !!}
                    {!! Form::text('bank_name', $user->bank_name, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1', 'readonly']) !!}
                </div>
            </div>
            {{--<div class="col-xs-1">&nbsp;</div>--}}

            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('bank_account_number', 'شماره حساب', ['class' => 'name_label']) !!}
                    {!! Form::text('bank_account_number', null, ['class'=>'form-control inputAccountBank', 'id'=>'inputAccountBank', 'tabindex'=>'18', 'readonly']) !!}
                </div>
            </div>

            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('bank_card_number', 'شماره کارت', ['class' => 'name_label']) !!}
                    {!! Form::text('bank_card_number', null, ['class'=>'form-control inputAccountBank', 'id'=>'inputAccountBank', 'tabindex'=>'17', 'readonly']) !!}
                </div>
            </div>
        </div>
        {{--<br>--}}
        <div class="row user_info_row">
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user pull-right">
                <div class="form-group">
                    {!! Form::label('zhenic_card_number', 'شماره ژنیک کارت', ['class' => 'name_label']) !!}
                    {!! Form::text('zhenic_card_number', null, ['class'=>'form-control inputAccountBank', 'id'=>'inputAccountBank', 'tabindex'=>'20', 'readonly']) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="row user_info_row">
            <div class="col-md-3 col-md-offset-0 col-xs-5  input_box_user name_bank_btn">
                <div class="row">
                    {!! Form::label('reg_type', 'نوع عضویت', ['class'=>'kind_label']) !!}
                    {!! Form::text('reg_type', $setRegType, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1', 'readonly']) !!}
                </div>
            </div>
            <div class="col-xs-1">&nbsp;</div>

            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    <div class="btn-group">
                        {!! Form::label('marketer', 'بازاریاب', ['class' => 'name_label']) !!}
                        {!! Form::text('marketer', null, ['class'=>'form-control inputSearch nav_up', 'id'=>'inputSearch', 'tabindex'=>'24', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                <div class="form-group">
                    {!! Form::label('acquainted_by', 'معرف', ['class' => 'name_label']) !!}
                    {!! Form::text('acquainted_by', null, ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'23', 'readonly']) !!}
                </div>
            </div>
        </div>

        <div class="row user_info_row">
            <div class="col-md-9">&nbsp;</div>
            <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user pull-right">
                <div class="form-group">
                    {!! Form::label('categories', 'دسته بندی', ['class'=>'kind_label']) !!}
                    {!! Form::text('categories', implode(", ", $setCategories), ['class'=>'form-control inputName', 'id'=>'inputName', 'tabindex'=>'1', 'readonly']) !!}
                </div>
            </div>
        </div>

        <hr>

        <!--------comment------->

        <div class="row user_info_row">
            <div class="col-xs-5"></div>
            <div class="col-xs-7 comment_box">
                <h4>{!! Form::label('text', 'توضیحات') !!}</h4>
{{--                {!! Form::textarea('text', null,['class'=>'form-control', 'id'=>'comment', 'rows'=>5, 'tabindex'=>'27', 'readonly']) !!}--}}
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                        <textarea id="news_text">{{ $user->text }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12" id="news_text_show">
                        <textarea>{{$user->text}}</textarea>
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

        <!--------submit button------->

        <div class="row">
            <div class="col-xs-12">
                <br><br><br><br><br><br>
            </div>
        </div>

    </div>
    {!! Form::close() !!}

@endsection

@section('customers')
    active
@endsection

@section('js')
    <script src="../../js/jquery-2.1.4.min.js"></script>
    {{--<script src="../../js/bootstrap.min.js"></script>--}}
    <script src="../../js/managementAddShop.js"></script>
    <script src="../../js/state-city.js"></script>
@endsection