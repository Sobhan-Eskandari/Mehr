@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | مشتریان
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
    <div class="container">
        <div class="row searh_box">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                {!! Form::open(['method'=>'POST', 'action'=>'UserController@finduser']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group">
                        {!! Form::text('name', null, ['class'=>'form-control inputSearch', 'id'=>'inputSearch', 'tabindex'=>'1', 'placeholder'=>'متن خود را جست و جو کنید']) !!}
                        <div class="input-group-addon">
                            <button type="submit" class="btn_search_inside">
                                <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @if(Session::has('deleted_user'))
        <div class="alert alert-danger">
            <p>{{ session('deleted_user') }}</p>
        </div>
    @endif
    {{--{!! Form::open(['method'=>'POST','action'=>'UserController@finduser']) !!}--}}

    {{--{{csrf_field()}}--}}

    {{--<div class="padding_right">--}}
        {{--<div class="row">--}}
            {{--<div class="col-xs-12">--}}
                {{--<h4 class="specification_title">جستجوی مشتری</h4>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<!-------------first row------------->--}}

        {{--<div class="row shop_info_row">--}}
            {{--<div class="col-md-4 col-md-offset-0 col-xs-5 col-xs-offset-8">--}}

            {{--</div>--}}

            {{--<div class="col-md-4 col-md-offset-0 col-xs-12 pull-right">--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::text('name',null,['class'=>'form-control inpuColXs4 height_eq_btn','id'=>'inpuColXs4','tabindex'=>'1']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<!------------record button------------>--}}
        {{--<br>--}}
        {{--<br>--}}
        {{--<div class="row">--}}
            {{--<div class="col-xs-12 padding_record_btn">--}}
                {{--{!! Form::submit('جستجو',['class'=>'btn record_btn']) !!}--}}
            {{--</div>--}}
        {{--</div>--}}


    {{--</div>--}}
    {{--{!! Form::close() !!}--}}
    <!-----------table------------>
    <div class="row margin_right_2nd_title">
        <div class="col-md-3 col-md-offset-0 col-xs-4 pull-left">
            <a href="{{ route('customers.create') }}"><button class="btn adv_btn pull-left">ایجاد مشتری&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></button></a>
        </div>
        <div class="col-md-3 col-md-offset-0 col-xs-4 pull-right">
            <h4 class="list_title">مشتریان</h4>
        </div>
    </div>
    {{--<br>--}}
    <div class="row">
        <div class="col-xs-12 table_padding">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>مشتریان</th>
                    <th>موبایل</th>
                    <th>آدرس</th>
                    <th>نوع مشتری</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)

                        <tr>
                            <td><img src="images/icone.png" class="icone_user">{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td class="upper_td">{{ $user->cell_1 }}</td>
                            <td class="upper_td">{{ $user->address }}</td>
                            <td class="upper_td">{{ $user->role == 0 ? 'مشتری' : 'صاحب فروشگاه' }}</td>
                            <td class="upper_td">
                                <div class="btn-group">
                                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="navbar-header">
                                            <div class="test">
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                        <li><a  href="{{ route('customers.edit', $user->id) }}">ویرایش</a></li>
                                        <li class="divider"></li>
                                        <li><a  href="{{ route('customers.show', $user->id) }}">نمایش</a></li>
                                        <li class="divider"></li>
                                        <li>
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['UserController@destroy', $user->id]]) !!}
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

    {{--  pagination  --}}

    <div class="row">
        <div class="col-lg-8 col-lg-offset-0 col-md-8 col-md-offset-0 col-xs-11 col-xs-offset-0 padding_pagination">
            <ul class="pagination">

                {{ $users->links() }}

            </ul>
        </div>
    </div>
@endsection

@section('customers')
    active
@endsection

@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/managementAddShop.js"></script>
@endsection