@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | ارسال پیام به کاربر
@endsection

@section('js2')
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap-select.min.js"></script>
@endsection

{{--@section('pms')--}}
    {{--css/pms.css--}}
{{--@endsection--}}

@section('css')
    ../css/sendMessageToUser.css
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
        {!! Form::open(['method'=>'POST', 'action'=>'MessageController@SendMailToUser', 'onsubmit'=>"return confirm('آیا از تأیید خود مطمئن هستید؟');"]) !!}
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('subject', 'موضوع:', ['class' => 'name_label']) !!}
                {!! Form::text('subject', null, ['class'=>'form-control sendMessageInput', 'id'=>'sendMessageInput', 'tabindex'=>'2', 'placeholder'=>'موضوع پیام را وارد کنید']) !!}
            </div>
        </div>

        <div class="col-lg-3 col-md-12 col-md-12 col-sm-12 col-xs-12">
            &nbsp;
        </div>

        <div class="col-lg-4 col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('email', 'ارسال به:', ['class' => 'name_label']) !!}
                {!! Form::text('email', null, ['class'=>'form-control sendMessageInput', 'id'=>'sendMessageInput', 'tabindex'=>'1', 'placeholder'=>'ایمیل مورد نظر را وارد کنید']) !!}
            </div>
        </div>

    </div>

    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                {!! Form::textarea('message', null,['class'=>'form-control inputCommentsMessage', 'id'=>'inputCommentsMessage', 'rows'=>2, 'tabindex'=>'3', 'placeholder'=>'متن پیام خود را وارد کنید']) !!}
                <script>
                    CKEDITOR.replace( 'message' );
                </script>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            {!! Form::submit('ارسال پیام', ['class'=>'btn makeUser_btn', 'tabindex'=>'28']) !!}
        </div>
    </div>

</div>
@endsection

@section('messages')
    active
@endsection

@section('js')
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/managementAddShop.js"></script>
@endsection