@extends('layouts.app')

@section('content')
    <div class="container-fluid boxing">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 edges">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="account_title">وارد حساب کاربری خود شوید</h3>
                    </div>
                </div>
                <br>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}
                        <div class="row input_boxing">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <div class="inner-addon right-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                <input id="inputName" type="email" class="form-control inputName" placeholder="نام کاربری" tabindex="1" name="email" value="{{ old('email') }}" required >
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>



                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                        <div class="row input_boxing">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <div class="inner-addon right-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                <input id="inputPass" type="password" placeholder="رمز عبور" tabindex="2" class="form-control inputPass" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row check_boxing">
                            <div class="col-xs-12">
                                <main>
                                    <li class="check_part">
                                        <label class='with-square-checkbox'>
                                            <input class="checkbox style-2 pull-right" type='checkbox' name="remember">
                                            <span class="check_title">مرا به خاطر داشته باش</span>
                                        </label>
                                    </li>
                                </main>
                            </div>
                        </div>

                        <div class="row boxing_btn_login">
                            <div class="col-xs-12">
                                <button class="login_button btn" tabindex="4">ورود</button>
                            </div>
                        </div>

                                {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
                                    {{--Forgot Your Password?--}}
                                {{--</a>--}}
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
