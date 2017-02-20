@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | پیام ها
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="css/users.css">
@endsection

@section('pms')
    css/pms.css
@endsection

@section('css')
    css/announcement.css
@endsection

@section('bootstrap_select')
    css/bootstrap-select.css
@endsection

@section('content')

    @if(Session::has('message_deleted'))
        <div class="alert alert-danger">
            <p>{{ session('message_deleted') }}</p>
        </div>
    @endif

<br>
<div class="row">
    <div class="col-xs-12 table_padding">
        <!-----------button----------->
        <div class="row">
            <div class="col-md-3 col-md-offset-0 col-xs-6 pull-left">
                <a href="{{ route('messages.create')}}"><button class="btn adv_btn pull-left">ارسال پیام&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></button></a>
            </div>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><h4>پیام ها</h4></th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($messages as $message)
            @if ($message->read == 0)
                <tr class="gray_back_color">
            @else
                <tr>
            @endif
                <td>
                    <img src="images/icone.png" class="icone_user pull-right">
                    <span class="pull-right one_row_table"><h4 class="table_title"><span class="name_h">{{ $message->name }}</span>&nbsp;|<span class="date">&nbsp;{{ $message->created_at->format('Y/m/d') }}</span></h4></span>
                    <br><br>
                    <span class="more_exp_tb">{{ str_limit("$message->message", 150) }}</span>
                </td>

                <td class="upper_td">

                    <div class="btn-group">
                        <a class=" dropdown-toggle" data-toggle="dropdown" href="#">
                            <div class="navbar-header">
                                <div class="test">
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                            <li><a  href="{{ route('messages.show', $message->id) }}">نمایش</a></li>
                            <li class="divider"></li>
                            <li><a  href="{{ route('messages.show', $message->id) }}">پاسخ</a></li>
                            <li class="divider"></li>
                            <li>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['MessageController@destroy', $message->id]]) !!}
                                    {!! Form::submit('حذف', ['id'=>'delete']) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>

                </td>
            </tr>

            @endforeach


            </tbody>
        </table>

    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-lg-offset-0 col-md-8 col-md-offset-0 col-xs-11 col-xs-offset-0 padding_pagination">
        <ul class="pagination">

            {{ $messages->links() }}

        </ul>
    </div>
</div>
@endsection

@section('messages')
    active
@endsection

@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/managementAddShop.js"></script>
@endsection