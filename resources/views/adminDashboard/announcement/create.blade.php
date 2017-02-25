@extends('layouts.zhenicAdmin')

@section('title')
    مهرکارت | ایجاد خبر
@endsection

@section('js2')
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap-select.min.js"></script>
@endsection

@section('css')
    ../css/makeAnnouncement.css
@endsection

@section('sidebar')
    ../css/sidebar.css
@endsection

@section('bootstrap_select')
    ../css/bootstrap-select.css
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
        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <h4 class="tiltle_make_news">ایجاد خبر جدید</h4>
        </div>
    </div>

    <div class="row seprate_box">
        <hr>
    </div>
    {!! Form::open(['method'=>'POST', 'action'=>'NewsController@store', 'onsubmit'=>"return confirm('آیا از تأیید خود مطمئن هستید؟');"]) !!}
    <div class="row inputMakeNews_box">
        <div class="col-xs-12">
            <div class="form-group">
                {!! Form::text('title', null, ['class'=>'form-control inputMakeNews', 'id'=>'inputMakeNews', 'tabindex'=>'1', 'placeholder'=>'عنوان خبر خود را وارد کنید']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 padding_inputComments pull-right">
            <div class="form-group">
                {!! Form::textarea('body', null,['class'=>'form-control inputComments', 'id'=>'inputComments', 'rows'=>2, 'tabindex'=>'2', 'placeholder'=>'توضیحات خود را وارد کنید']) !!}
                <script>
                    CKEDITOR.replace( 'body' );
                </script>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            {!! Form::submit('ایجاد خبر', ['class'=>'btn makeUser_btn', 'tabindex'=>'28']) !!}
        </div>
    </div>

</div>
{!! Form::close() !!}
@endsection

@section('announcement')
    active
@endsection

@section('js')
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/managementAddShop.js"></script>
@endsection