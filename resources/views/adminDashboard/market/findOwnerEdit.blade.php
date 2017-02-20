@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | ایجاد فروشگاه
@endsection

@section('js2')
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../../css/persianDatepicker-default.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

@endsection

@section('css')
    ../../css/makeShop.css
@endsection

@section('pms')
    ../../css/pms.css
@endsection


@section('bootstrap_select')
    ../../css/bootstrap-select.css
@endsection

@section('content')

    <!--------specification of shops-------->

    {!! Form::open(['method'=>'POST','action'=>['marketController@searchSellerEdit',$market->id]]) !!}

    {{csrf_field()}}

    <div class="padding_right">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="specification_title">مالک را بیابید</h4>
            </div>
        </div>

        <!-------------first row------------->

        <div class="row shop_info_row">
            <div class="col-md-4 col-md-offset-0 col-xs-5 col-xs-offset-8">

            </div>

            <div class="col-md-4 col-md-offset-0 col-xs-12 pull-right">
                <div class="form-group">

                    <label>جستجوی مالک</label>
                    {!! Form::text('name',null,['class'=>'form-control inpuColXs4 height_eq_btn','id'=>'inpuColXs4','tabindex'=>'1']) !!}

                    {{--<input class="form-control inpuColXs4 height_eq_btn" type="text" id="inpuColXs4" tabindex="1">--}}

                    {{--<a href="{{url('markets/find')}}" target="_blank" class="btn search_btn pull-left">--}}
                    {{--<span class="glyphicon glyphicon-search"></span>--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>


        <!------------record button------------>
        <br>
        <br>
        <div class="row">
            <div class="col-xs-12 padding_record_btn">
                {{--<button class="btn record_btn">ثبت فروشگاه </button>--}}
                {!! Form::submit('جستجو',['class'=>'btn record_btn']) !!}

            </div>
        </div>


    </div>

    {{--</form>--}}
    {!! Form::close() !!}
    @if(isset($users))
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
        <label><h4>مالکین:</h4></label>
        <table class="table table-bordered">

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="list">{{$user->first_name}}</td>
                    <td class="edit"><a href="{{route('edit',[$market->id ,$user->id])}}" >انتخاب کنید</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>
                    </div>
                </div>
            </div>
    @endif

@endsection


@section('markets')
    active
@endsection
@section('js')
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/managementAddShop.js"></script>
    {{--<script src="../js/state-city.js"></script>--}}
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript" src="../../js/persianDatepicker.min.js"></script>

    <script src="../../js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyD8ClNTU8WBKdBG8qwgaCZA5fHjWitwV-M &callback=myMap">
    </script>



@endsection