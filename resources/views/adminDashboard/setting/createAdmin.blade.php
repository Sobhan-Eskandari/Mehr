@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | تنظیمات
@endsection

@section('js2')
    {{--<script src="../js/managementAddShop.js"></script>--}}
    {{--<script src="../js/jquery-2.1.4.min.js"></script>--}}
    {{--<script src="../js/bootstrap-select.min.js"></script>--}}
    {{--<script src="../js/state-city.js"></script>--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
    <script src="../../js/state-city.js"></script>
@endsection

{{--@section('pms')--}}
    {{--../css/pms.css--}}
{{--@endsection--}}

@section('css')
    ../css/editAdminNew.css
@endsection

@section('bootstrap_select')
    ../css/bootstrap-select.css
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

    <div class="padding_right">

        <div class="row">
            <div class="col-xs-12">
                <h4 class="makeUser_title">ایجاد ادمین</h4>
            </div>
        </div>
        {!! Form::open(['method'=>'POST', 'action'=>'AdminController@store']) !!}
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

                <br>

                <!------second row button & input------->

                <div class="row shop_info_row">

                    <div class="col-md-6 col-md-offset-0 col-xs-12 ">
                        &nbsp;
                    </div>
                    <div class="col-md-2 col-md-offset-0 col-xs-5  level_choose_btn">
                        <div class="row">
                            {!! Form::label('education', 'تحصیلات', ['class'=>'kind_label']) !!}
                        </div>
                        <div class="row dropdown">
                            {!! Form::select('education', array(0 => 'انتخاب کنید', 'بی سواد' => 'بی سواد', 'زیر دیپلم' => 'زیر دیپلم', 'دیپلم' => 'دیپلم', 'کاردانی' => 'کاردانی', 'کارشناسی' => 'کارشناسی', 'کارشناسی ارشد' => 'کارشناسی ارشد', 'دکترا' => 'دکترا', 'دکترا به بالا' => 'دکترا به بالا'), 0, ['class'=>'selectpicker', 'tabindex'=>'5']) !!}
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
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
                            {!! Form::text('zip', null, ['class'=>'form-control inputCodePost', 'id'=>'inputCodePost', 'tabindex'=>'8']) !!}
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
                            {!! Form::select('state', $states, "گیلان", ['class'=>'selectpicker', 'tabindex'=>'6']) !!}
                        </div>
                    </div>

                </div>

                <br>
                <div class="row shop_info_row">
                    <div class="col-xs-6">&nbsp;</div>
                    <div class="col-md-6 col-md-offset-0 col-xs-12 input_box_shop pull-left address_box">
                        <div class="form-group">
                            {!! Form::label('address', 'نشانی', ['class' => 'name_label']) !!}
                            {!! Form::text('address', null, ['class'=>'form-control inputAddress', 'id'=>'inputAddress', 'tabindex'=>'9']) !!}
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row user_info_row">
                    <!------3rd row button & input-------->
                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        <div class="form-group">
                            {!! Form::label('cell_2', 'موبایل 2', ['class' => 'name_label']) !!}
                            {!! Form::text('cell_2', null, ['class'=>'form-control inputMobile', 'id'=>'inputMobile', 'tabindex'=>'12']) !!}
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        <div class="form-group">
                            {!! Form::label('cell_1', 'موبایل 1', ['class' => 'name_label']) !!}
                            {!! Form::text('cell_1', null, ['class'=>'form-control inputMobile', 'id'=>'inputMobile', 'tabindex'=>'11']) !!}
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        <div class="form-group">
                            {!! Form::label('home_tel', 'تلفن منزل', ['class' => 'name_label']) !!}
                            {!! Form::text('home_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'10']) !!}
                        </div>
                    </div>
                </div>
                <br>

                <div class="row user_info_row">
                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        &nbsp;
                    </div>
                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        <div class="form-group">
                            {!! Form::label('emergency_tel', 'تلفن تماس ضروری', ['class' => 'name_label']) !!}
                            {!! Form::text('emergency_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'14']) !!}
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        <div class="form-group">
                            {!! Form::label('work_tel', 'تلفن محل کار', ['class' => 'name_label']) !!}
                            {!! Form::text('work_tel', null, ['class'=>'form-control inputTel', 'id'=>'inputTel', 'tabindex'=>'13']) !!}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row user_info_row">
                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        &nbsp;
                    </div>
                    <div class="col-md-8 col-md-offset-0 col-xs-12 input_box_user">
                        <div class="form-group">
                            {!! Form::label('email', 'ایمیل', ['class' => 'name_label']) !!}
                            {!! Form::text('email', null, ['class'=>'form-control inputEmail', 'id'=>'inputEmail', 'tabindex'=>'15']) !!}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row user_info_row">
                    <div class="col-xs-4">&nbsp;</div>

                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'تأیید رمز عبور', ['class'=>'name_label']) !!}
                            {!! Form::password('password_confirmation', ['class'=>'form-control inputPass', 'id'=>'inputPass', 'tabindex'=>'17']) !!}
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-0 col-xs-12 input_box_user">
                        <div class="form-group">
                            {!! Form::label('password', 'رمز عبور', ['class'=>'name_label']) !!}
                            {!! Form::password('password', ['class'=>'form-control inputPass', 'id'=>'inputPass', 'tabindex'=>'16']) !!}
                        </div>
                    </div>
                </div>
                <hr>

                <!--------------access------------>

                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <h4>دسترسی ها :</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-1">
                        <li>
                            {!! Form::label('view_message', 'نمایش پیام ها', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('view_message') !!}
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('create_news', 'ایجاد خبر', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('create_news') !!}
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('delete_market', 'حذف فروشگاه', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('delete_market') !!}
                        </li>

                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('edit_market', 'ویرایش فروشگاه', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('edit_market') !!}
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('create_user', 'ایجاد مشتری', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('create_user') !!}
                        </li>

                    </div>
                </div>

                <!--------checkBox-------->

                <br>
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-3">
                        <li>
                            {!! Form::label('edit_news', 'ویرایش خبر', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('edit_news') !!}
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('delete_user', 'حذف مشتری', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('delete_user') !!}
                        </li>

                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('edit_user', 'ویرایش مشتری', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('edit_user') !!}
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('create_market', 'ایجاد فروشگاه', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('create_market') !!}
                        </li>

                    </div>
                </div>

                <br>


                <div class="row">

                    <div class="col-xs-2 col-xs-offset-3">
                        <li>
                            {!! Form::label('delete_news', 'حذف خبر', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('delete_news') !!}
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('delete_admin', 'حذف ادمین', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('delete_admin') !!}
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('edit_admin', 'ویرایش ادمین', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('edit_admin') !!}
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li>
                            {!! Form::label('create_admin', 'ایجاد ادمین', ['class'=>'with-square-checkbox']) !!}
                            {!! Form::checkbox('create_admin') !!}
                        </li>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::submit('ایجاد ادمین', ['class'=>'btn makeUser_btn']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
@endsection

@section('settings')
    active
@endsection

@section('js')
    <script src="../../js/jquery-2.1.4.min.js"></script>
    {{--<script src="../../js/bootstrap.min.js"></script>--}}
    <script src="../../js/managementAddShop.js"></script>
    <script src="../../js/state-city.js"></script>
@endsection