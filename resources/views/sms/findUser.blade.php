@extends('layouts.zhenicSite')

@section('title')
    ژنیک | ارسال پیامک
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
@endsection

@section('css')
    {{--<link href="css/aboutZhenic.css" rel="stylesheet" type="text/css" />--}}
    <link href="css/homePage.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/sms.css">
@endsection

@section('contactUs')
    {{ route('contactUs') }}
@endsection

@section('content')

    <form method="POST" action="/findUser">
        {{csrf_field()}}
        <div class="row">
            @if(count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif.
                <div class="container" id="change_pass">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                            <form>
                                <h3>&nbsp;</h3>
                                <div class="form-group">
                                    <label><h4>شماره را وارد کنید:{{session()->get("message")}}</h4></label>
                                    <input class="form-control inputCategory" type="text" id="inputCategory" tabindex="1" name="cell" style="margin-top: 50px; !important;
              display: initial !important;" >
                                    <br>
                                    <button class="btn record_btn">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </div>

        @if(isset($user))
            @foreach($user as $number)
                {{$number->cell_1}}
            @endforeach
        @endif
    </form>
    {{--<a href="{{ url('/logout') }}"--}}
    {{--onclick="event.preventDefault();--}}
    {{--document.getElementById('logout-form').submit();">--}}
    {{--Logout--}}
    {{--</a>--}}

    {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
    {{--{{ csrf_field() }}--}}
    {{--</form>--}}
@endsection

@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
@endsection
