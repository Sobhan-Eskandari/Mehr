@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | فروشگاه ها
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    {{--<link rel="stylesheet" href="css/makeAnnouncement.css">--}}
    <link rel="stylesheet" href="css/shops.css">
@endsection

{{--@section('pms')--}}
    {{--css/pms.css--}}
{{--@endsection--}}

@section('css')
    css/announcement.css
@endsection

{{--@section('bootstrap_select')--}}
    {{--css/bootstrap-select.css--}}
{{--@endsection--}}

@section('content')

    <div class="container">
        <div class="row searh_box">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                {!! Form::open(['method'=>'POST', 'action'=>'marketController@findmarket']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group">
                        {!! Form::text('name', null, ['class'=>'form-control inputSearch', 'id'=>'inputSearch', 'tabindex'=>'1', 'placeholder'=>'متن خود را جست و جو کنید']) !!}
                        <div class="input-group-addon">
                            <button type="submit" class="btn_search_inside" style="background: none; border: none">
                                <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{--{!! Form::open(['method'=>'POST','action'=>'marketController@findmarket']) !!}--}}

    {{--{{csrf_field()}}--}}

    {{--<div class="padding_right">--}}
        {{--<div class="row">--}}
            {{--<div class="col-xs-12">--}}
                {{--<h4 class="specification_title">جستجوی فروشگاه</h4>--}}
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
                {{--<button class="btn record_btn">ثبت فروشگاه </button>--}}
                {{--{!! Form::submit('جستجو',['class'=>'btn record_btn']) !!}--}}

            {{--</div>--}}
        {{--</div>--}}


    {{--</div>--}}

    {{--</form>--}}
    {{--{!! Form::close() !!}--}}

    <div class="row margin_right_2nd_title">
        <div class="col-md-3 col-md-offset-0 col-xs-4 pull-left">
           <a href="{{route('searchSeller')}}"><button class="btn adv_btn pull-left">ایجاد فروشگاه&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></button></a>
        </div>
        <div class="col-md-3 col-md-offset-0 col-xs-4 pull-right">
            <h4 class="list_title">لیست فروشگاه ها</h4>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 table_padding">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>عنوان فروشگاه</th>
                    <th>تاریخ ایجاد</th>
                    <th>نوع فروشگاه</th>
                    <th>مالک فروشگاه</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @if($markets)
                    @foreach($markets as $market)
                <tr>
                    <td>{{$market->market_name}}</td>
                    <td>{{$market->created_at}}</td>
                    <td>{{$market->market_type == 1 ? "ویژه" : "معمولی"}}</td>
                    <td>{{$market->user->first_name}}</td>
                    <td>

                        <div class="btn-group">
                            <a class=" dropdown-toggle" data-toggle="dropdown" href="#">
                                <div class="navbar-header">
                                    <div class="test">
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a  href="{{route('edit',['marketId'=>$market->id,'sellerId'=>$market->user_id])}}">ویرایش</a></li>
                                <li class="divider"></li>
                                <li><a  href="{{route('show',['marketId'=>$market->id])}}">نمایش</a></li>
                                <li class="divider"></li>
                                <li>
                                    {!! Form::open(['method'=>'DELETE','action'=>['marketController@destroy',$market->id]]) !!}

                                    {!! Form::submit('حذف',['id'=>'delete']) !!}

                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </div>

                    </td>
                </tr>
                @endforeach
                @endif


                </tbody>
            </table>


        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-0 col-md-8 col-md-offset-0 col-xs-11 col-xs-offset-0 padding_pagination">
            <ul class="pagination">
                {{$markets->links()}}
            </ul>
        </div>
    </div>



@endsection


@section('markets')
    active
@endsection
@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src=".js/managementAddShop.js"></script>
    <script src="js/state-city.js"></script>

@endsection