@extends('layouts.zhenicAdmin')

@section('title')
    مهرکارت | تعرفه
@endsection
@section('js2')
    <link type="text/css" rel="stylesheet" href="../../css/persianDatepicker-default.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../../css/persianDatepicker-default.css" />
    <script src="../../js/state-city.js"></script>
@endsection
@section('pms')
    css/pms.css
@endsection

@section('css')
    css/memberKind.css
@endsection

@section('content')



    <div class="row downer_from_menu">

        <div class="col-lg-7 col-md-6 col-xs-8 pdding_left">
            <label><h4>دسته بندی تعرفه ها:</h4></label>
            <table class="table table-bordered">

                <tbody>
                @if($tariffs)
                    @foreach($tariffs as $tariff)
                        <tr>
                            <td class="list">{{$tariff->name}}</td>
                            <td class="edit"><a href="{{route("tariffs.edit",$tariff->id)}}">ویرایش</a></td>
                            <td class="delet">
                                {!! Form::open(['method'=>'DELETE','action'=>['tariff2Controller@destroy',$tariff->id]]) !!}

                                {!! Form::submit('حذف',['id'=>'delete', 'style'=>"background: none; border:none"]) !!}

                                {!! Form::close() !!}

                            </td>
                        </tr>
                @endforeach
                @endif

            </table>
            <div class="row">
                <div class="col-lg-12 col-lg-offset-0 col-md-8 col-md-offset-0 col-xs-11 col-xs-offset-0 padding_pagination">
                    <ul class="pagination">

                        {{ $tariffs->links() }}

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-6 col-xs-4  margin_right">
            {!! Form::open(['method'=>'POST','action'=>'tariff2Controller@store']) !!}
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
                        {!! Form::select('tariff[]',\App\Tariff::pluck('name','id')->toArray(), null,['class'=>'selectpicker',"tabindex"=>"3",'data-live-search'=>'true']) !!}
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