@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | پیام ها
@endsection

@section('js2')
    <style>
        #mail {
            background-color: #252525;
            border: none;
            color: white;
        }
        #name {
            background-color: #252525;
            border: none;
            color: white;
        }
    </style>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
@endsection

@section('pms')
    ../css/pms.css
@endsection

@section('css')
    ../css/answerMessage.css
@endsection

@section('sidebar')
    ../css/sidebar.css
@endsection

@section('bootstrap_select')
    ../css/bootstrap-select.css
@endsection

@section('content')

    <div class="row white_box_padding">
        <div class="col-xs-12">
            <div class="panel panel-default first_panel ">
                <div class="panel-heading first_header_box">
                    {!! Form::open(['method'=>'POST', 'action'=>'MessageController@sendMail']) !!}
                    <h4 class="heading_panel"><span class="glyphicon glyphicon-user user"></span>&nbsp;{!! Form::text('name', $message->name, ['id'=>'name', 'readonly']) !!}&nbsp;&nbsp;&nbsp;{{ $message->created_at->format('Y/m/d') }}
                        <span class="pull-left">{{ $message->email }}</span>
                    </h4>

                </div>

                <div class="panel-body first_panelBody">
                    <p>{{ $message->message }}</p>

                </div>
            </div>
        </div>
    </div>
    <!----answer box---->
    <div class="row white_box_padding">
        <div class="col-xs-12">
                <div class="panel panel-default second_panel">
                    <div class="panel-heading second_header_box">

                        <h4 class="second_answer_head">پاسخ به :
                            {!! Form::text('email', $message->email, ['id'=>'mail', 'readonly']) !!}

                            <span class="pull-left subject_answer">
                                                    <div class="form-group">
                                                        {!! Form::text('subject', null, ['class'=>'form-control admin_holder col-sm-10', 'placeholder'=>'موضوع پیام را وارد کنید', 'id'=>'inpuSubAns', 'tabindex'=>'1']) !!}
                                                    </div>
                                                </span>
                            <span class="pull-left">موضوع :&nbsp;&nbsp;&nbsp;</span>
                        </h4>
                    </div>


                    <!---send message button---->
                    <div class="form-group textOfAnswer">
                        {!! Form::textarea('message', null,['class'=>'form-control', 'id'=>'inputComments_answer', 'placeholder'=>'متن پاسخ را وارد نمایید', 'rows'=>1, 'tabindex'=>'2']) !!}
                        <script>
                            CKEDITOR.replace( 'message' );
                        </script>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-md-offset-0 col-xs-4 col-xs-offset-1">
                        {!! Form::submit('ارسال پاسخ', ['class'=>'answer_send btn', 'tabindex'=>'3']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
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