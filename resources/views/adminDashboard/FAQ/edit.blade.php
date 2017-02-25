@extends('layouts.zhenicAdmin')

@section('title')
    مهرکارت | ویرایش سوال
@endsection

@section('js2')
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
@endsection

{{--@section('pms')--}}
{{--../css/pms.css--}}
{{--@endsection--}}

@section('css')
    ../../css/makeAnnouncement.css
@endsection

@section('bootstrap_select')
    ../../css/bootstrap-select.css
@endsection

@section('sidebar')
    ../../css/sidebar.css
@endsection

@section('content')
    <div class="padding_right">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                <h4 class="tiltle_make_news">ویرایش سوال</h4>
            </div>
        </div>

        <div class="row seprate_box">
            <hr>
        </div>
        {!! Form::model($FAQ , ['method'=>'PUT', 'action'=>['FAQController@update', $FAQ->id]]) !!}
        <div class="row inputMakeNews_box">
            <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::text('question', null, ['class'=>'form-control inputMakeNews', 'id'=>'inputMakeNews', 'tabindex'=>'1', 'placeholder'=>'سوال خود را وارد کنید']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 padding_inputComments pull-right">
                <div class="form-group">
                    {!! Form::textarea('answer', null,['class'=>'form-control inputComments', 'id'=>'inputComments', 'rows'=>2, 'tabindex'=>'2', 'placeholder'=>'جواب را وارد کنید']) !!}
                </div>
                <script>
                    CKEDITOR.replace( 'answer' );
                </script>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                {!! Form::submit('ویرایش سوال', ['class'=>'btn makeUser_btn', 'tabindex'=>'28']) !!}
            </div>
        </div>

    </div>
    {!! Form::close() !!}
@endsection

@section('announcement')
    active
@endsection

@section('js')
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/managementAddShop.js"></script>
@endsection