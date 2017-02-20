@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | دسته بندی سیستمی
@endsection

@section('pms')
    css/pms.css
@endsection

@section('css')
    css/category.css
@endsection

@section('content')


    <div class="row downer_from_menu">

        <div class="col-lg-7 col-md-6 col-xs-8 pdding_left">
            <label><h4>دسته بندی های فرشگاه:</h4></label>
            <table class="table table-bordered">

                <tbody>
                @if($marketCategories)
                    @foreach($marketCategories as $marketCategory)
                        <tr>
                            <td class="list">{{$marketCategory->name}}</td>
                            <td class="edit"><a href="{{route("marketCategories.edit",$marketCategory->id)}}">ویرایش</a></td>
                            <td class="delet">
                                {!! Form::open(['method'=>'DELETE','action'=>['mategory@destroy',$marketCategory->id]]) !!}

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

                        {{ $marketCategories->links() }}

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-6 col-xs-4  margin_right">
            <form method="POST" action="/marketCategories">
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
                        <label><h4>دسته بندی فروشگاه:</h4></label>
                        <input class="form-control inputCategory" type="text" id="inputCategory" tabindex="1" name="name">
                    </div>
                </div>
                <div class="row">
                    <button class="btn record_btn">ثبت</button>
                </div>
            </form>
        </div>

    </div>

@endsection


@section('categories')
    active
@endsection