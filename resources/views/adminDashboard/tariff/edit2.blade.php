@extends('layouts.zhenicAdmin')

@section('title')
    مهرکارت | ویرایش تعرفه
@endsection

@section('js2')
    {{--<link type="text/css" rel="stylesheet" href="../../css/bootstrap.css">--}}
    {{--<link type="text/css" rel="stylesheet" href="../../css/bootstrap-select.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{--<script src="../../js/jquery-2.1.4.min.js"></script>--}}
    {{--<script src="../../js/bootstrap.min.js"></script>--}}
    {{--<script src="../../js/bootstrap-select.min.js"></script>--}}
    <link type="text/css" rel="stylesheet" href="../../css/persianDatepicker-default.css" />
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">--}}
    {{--<script src="../../js/state-city.js"></script>--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../../css/persianDatepicker-default.css" />
    <script src="../../js/state-city.js"></script>

    {{--<script src="../js/state-city.js"></script>--}}
@endsection

@section('pms')
    ../../css/pms.css
@endsection

@section('css')
    ../../css/memberKind.css
@endsection

@section('content')

    <div class="row downer_from_menu">

        <div class="col-lg-6 col-md-6 col-xs-4  margin_right">
            {!! Form::model($tariff,['method'=>'PATCH','action'=>['tariff2Controller@update',$tariff->id]]) !!}
            {{--<form method="POST" action="/tariffs">--}}
            {{csrf_field()}}
            <div class="row">
                {{session()->get("message")}}
                @if(count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>
                @endif
                <div class="form-group">
                    <label><h4>تعرفه</h4></label><br>
                    {!! Form::label('name','نام تعرفه') !!}
                    {!! Form::text('name',null,['class'=>'form-control inputCategory','id'=>'inputCategory','tabindex'=>'1']) !!}
                    {{--<input class="" type="text" id="" tabindex="1" name="name">--}}
                    {!! Form::label('cost','قیمت تعرفه') !!}
                    {!! Form::text('cost',null,['class'=>'form-control inputCategory','id'=>'inputCategory','tabindex'=>'2']) !!}
                    {!! Form::label('tariff','نوع تعرفه') !!}
                    {!! Form::select('tariff[]',\App\Tariff::pluck('name','id')->toArray(), $tariff->tariffs->pluck('id')->toArray(),['class'=>'selectpicker',"tabindex"=>"3",'data-live-search'=>'true']) !!}
                    <br>
                    {!! Form::label('desc','توضیحات') !!}
                    {!! Form::textarea('desc',null,['class'=>'form-control inputCategory','id'=>'inputCategory','tabindex'=>'4','rows'=>'3']) !!}
                </div>
            </div>
            <div class="row">
                <button class="btn record_btn">ثبت</button>
            </div>
            {{--</form>--}}
            {!! Form::close() !!}
        </div>

    </div>

@endsection


@section('tariffs')
    active
@endsection