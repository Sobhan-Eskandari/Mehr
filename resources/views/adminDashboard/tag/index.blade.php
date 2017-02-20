@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | تگ
@endsection

@section('pms')
    css/pms.css
@endsection

@section('css')
    css/tags.css
@endsection

@section('content')


    <div class="row downer_from_menu">

        <div class="col-lg-7 col-md-6 col-xs-8 pdding_left">
            <label><h4>تگ ها:</h4></label>
            <table class="table table-bordered">

                <tbody>
                @if($tags)
                    @foreach($tags as $tag)
                        <tr>
                            <td class="list">{{$tag->name}}</td>
                            <td class="edit"><a href="{{route("tags.edit",$tag->id)}}">ویرایش</a></td>
                            <td class="delet">
                                {!! Form::open(['method'=>'DELETE','action'=>['TagController@destroy',$tag->id]]) !!}

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

                        {{ $tags->links() }}

                    </ul>
                </div>
            </div>

        </div>

        <div class="col-lg-5 col-md-6 col-xs-4  margin_right">
            <form method="POST" action="/tags ">
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
                        <label><h4>تگ:</h4></label>
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


@section('tags')
    active
@endsection