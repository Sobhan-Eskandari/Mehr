@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | نوع عضویت
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
            {!! Form::model($regType,['method'=>'PATCH','action'=>['regTypeController@update',$regType->id]]) !!}
            {{csrf_field()}}

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
                    <label><h4>نوع عضویت:</h4></label>
                    {!! Form::text('name',null,['class'=>'form-control inputCategory','id'=>'inputCategory','tabindex'=>'1']) !!}
                </div>
            </div>
            <div class="row">
                {!! Form::submit('ویرایش',['class'=>'btn record_btn']) !!}

            </div>
            {!! Form::close() !!}
        </div>

    </div>

@endsection


@section('regType')
    active
@endsection