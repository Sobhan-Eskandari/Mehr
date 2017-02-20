@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | پشتیبان گیری از پایگاه داده
@endsection

@section('js2')
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
    <script src="../../js/managementAddShop.js"></script>
    <script src="../../js/state-city.js"></script>
@endsection

@section('pms')
    ../../css/pms.css
@endsection

@section('css')
    ../../css/backUp2.css
@endsection

@section('sidebar')
    ../css/sidebar.css
@endsection

@section('bootstrap_select')
    ../../css/bootstrap-select.css
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="row backUp_box_padding">
        <h3>جدول کاربران</h3>
        <br>

        <div class="col-xs-12 backUp_box">
            <form action="{{ URL::to('uploadBackupUsers') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-9 col-md-offset-0 col-xs-6">
                        <div class="form-group">
                            <input class="form-control inputSearch" type="text" id="users_fileaddress" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-0 col-xs-6">
                        <label class="btn btn-default btn-file btn_search">انتخاب فایل
                            <input type="file" id="user_file_upload" style="display: none;" name="import_file_user">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 col-md-offset-0 col-xs-6">
                        &nbsp;
                    </div>
                    <div class="col-md-3 col-md-offset-0 col-xs-6">
                        <button class="btn btn_load">بارگذاری</button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="row">
                <h5 class="backUp_title">فایل پشتیبان خود را اینجا دانلود کنید</h5>
            </div>

            <div class="row">
                <div class="col-xs-12 btn_padding">
                    <a href="{{ url('downloadBackupUsers/xlsx') }}"><button class="btn backUp_btn">دریافت فایل پشتیبان</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row backUp_box_padding second">
        <h3>جدول فروشگاه ها</h3>
        <br>
        <div class="col-xs-12 backUp_box">
            <form action="{{ URL::to('uploadBackupMarkets') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-md-9 col-md-offset-0 col-xs-6">
                    <div class="form-group">
                        <input class="form-control inputSearch" type="text" id="stores_fileaddress" readonly>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-0 col-xs-6">
                    <label class="btn btn-default btn-file btn_search">
                        انتخاب فایل
                        <input type="file" id="store_file_upload" style="display: none;" name="import_file_market">
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 col-md-offset-0 col-xs-6">
                    &nbsp;
                </div>
                <div class="col-md-3 col-md-offset-0 col-xs-6">
                    <button class="btn btn_load">
                        بارگذاری
                    </button>
                </div>
            </div>
            </form>
            <hr>
            <div class="row">
                <h5 class="backUp_title">فایل پشتیبان خود را اینجا دانلود کنید</h5>
            </div>

            <div class="row">
                <div class="col-xs-12 btn_padding">
                    <a href="{{ url('downloadBackupMarkets/xlsx') }}"><button class="btn backUp_btn">دریافت فایل پشتیبان</button></a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('backup')
    active
@endsection

@section('js')
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/managementAddShop.js"></script>
    <script src="../../js/state-city.js"></script>
@endsection