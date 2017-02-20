@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | تنظیمات
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/managementAddShop.js"></script>
@endsection

@section('pms')
    css/pms.css
@endsection

@section('css')
    css/setting.css
@endsection

@section('bootstrap_select')
    css/bootstrap-select.css
@endsection

@section('sidebar')
    css/sidebar.css
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

    @if(Session::has('admin_updated'))
        <div class="alert alert-danger">
            <p>{{ session('admin_updated') }}</p>
        </div>
    @endif

    @if(Session::has('admin_created'))
        <div style="background-color: #00ee00">
            <p>{{ session('admin_created') }}</p>
        </div>
    @endif

    @if(Session::has('deleted_user'))
        <div class="alert alert-danger">
            <p>{{ session('deleted_user') }}</p>
        </div>
    @endif
    <!-------------------upload img----------------------->

    <div class="row big_box">
        <div class="col-xs-12">
            <h4>آپلود عکس های اسلایدر</h4>
        </div>
    </div>
    <br>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminController@info', 'files'=>true]) !!}
        {{ csrf_field() }}

    <div class="row big_box">
        <div class="col-md-3 col-md-offset-0 col-xs-5">
            <label class="btn btn-default btn-file upload_btn">
                انتخاب عکس
                <input name="photo_1" type="file" id="storeimg_uploadbtn_1" style="display: none;">
            </label>

        </div>
        <div class="col-md-8 col-md-offset-1 col-xs-7 input_img_padding">
            <input class="form-control upload_long_btn" type="text" id="store_img1" readonly>
        </div>
    </div>

    <br>

    <div class="row big_box">
        <div class="col-md-3 col-md-offset-0 col-xs-5">
            <label class="btn btn-default btn-file upload_btn">
                انتخاب عکس
                <input name="photo_2" type="file" id="storeimg_uploadbtn_2" style="display: none;">
            </label>

        </div>
        <div class="col-md-8 col-md-offset-1 col-xs-7 input_img_padding">
            <input class="form-control upload_long_btn" type="text" id="store_img2" readonly>
        </div>
    </div>

    <br>

    <div class="row big_box">
        <div class="col-md-3 col-md-offset-0 col-xs-5">
            <label class="btn btn-default btn-file upload_btn">
                انتخاب عکس
                <input name="photo_3" type="file" id="storeimg_uploadbtn_3" style="display: none;">
            </label>

        </div>
        <div class="col-md-8 col-md-offset-1 col-xs-7 input_img_padding">
            <input class="form-control upload_long_btn" type="text" id="store_img3" readonly>
        </div>
    </div>

    <br>
    <hr>
    <br>

    <!------------------Form----------------->

    <div class="row big_box">
        <div class="col-xs-12">
            <h4>تنظیمات تماس با ما</h4>
        </div>
    </div>
    <br>
    <div class="row big_box">
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('contact_tel', 'شماره تماس') !!}
                {!! Form::text('contact_tel', "$siteInfo->contact_tel", ['class'=>'form-control input', 'id'=>'input', 'tabindex'=>'2']) !!}
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('address', 'آدرس') !!}
                {!! Form::text('address', "$siteInfo->address", ['class'=>'form-control input', 'id'=>'input', 'tabindex'=>'1']) !!}
            </div>
        </div>
    </div>

    <div class="row big_box">
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('instagram', 'اینستاگرام') !!}
                {!! Form::text('instagram', "$siteInfo->instagram", ['class'=>'form-control input', 'id'=>'input', 'tabindex'=>'4']) !!}
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('telegram', 'تلگرام') !!}
                {!! Form::text('telegram', "$siteInfo->telegram", ['class'=>'form-control input', 'id'=>'input', 'tabindex'=>'3']) !!}
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="row big_box">
        <div class="col-xs-12">
            <button class="btn setting_btn">ایجاد تغییرات</button>
        </div>
    </div>

    {!! Form::close() !!}

    <!-------------------Table---------------->

    <hr>
    <br>
    <br>
    <div class="row big_box">
        <div class="col-md-4 pull-right">
            <h4>ادمین ها</h4>
        </div>
        <div class="col-md-4 pull-left">
            <a href="{{ route('settings.create') }}">
                <button class="btn pull-left btn_add_admin">اضافه نمودن ادمین&nbsp;
                    <i class="fa fa-plus" aria-hidden="true">
                    </i>
                </button>
            </a>
        </div>
    </div>
    <br>
    <br>
    <div class="row big_box tb">
        <div class="col-xs-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="tb_subject_post">نام</th>
                    <th class="tb_subject_post">ایمیل</th>
                    <th class="tb_subject_post">&nbsp;</th>
                    <th class="tb_subject_empty">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td class="tb_enter_post">{{ $admin->first_name }} {{ $admin->last_name }}</td>
                            <td class="tb_enter_post">{{ $admin->email }}</td>
                            <td class="tb_edit"><a href="{{ route('settings.edit', $admin->id) }}">ویرایش</a></td>
                            <td class="remove_shape_post">
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminController@destroy', $admin->id]]) !!}
                                <button type="submit" style="padding-top: 8px; padding-right: 8px; border: none; background: none;">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
    {{--  pagination  --}}

    <div class="row">
        <div class="col-lg-8 col-lg-offset-0 col-md-8 col-md-offset-0 col-xs-11 col-xs-offset-0 padding_pagination">
            <ul class="pagination">
                {{ $admins->links() }}
            </ul>
        </div>
    </div>
@endsection

@section('settings')
    active
@endsection

@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/managementAddShop.js"></script>
@endsection