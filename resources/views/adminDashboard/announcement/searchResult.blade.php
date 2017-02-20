@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | اخبار
@endsection

@section('js2')
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap-select.min.js"></script>
@endsection

@section('pms')
    ../css/pms.css
@endsection

@section('css')
    ../css/announcement.css
@endsection

@section('bootstrap_select')
    ../css/bootstrap-select.css
@endsection

@section('sidebar')
    ../css/sidebar.css
@endsection

@section('content')

    @if(Session::has('edited_news'))
        <div class="alert alert-danger">
            <p>{{ session('edited_news') }}</p>
        </div>
    @endif

    @if(Session::has('deleted_news'))
        <div class="alert alert-danger">
            <p>{{ session('deleted_news') }}</p>
        </div>
    @endif
    <!---------------search form----------------->
    <div class="container">
        <div class="row searh_box">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                {!! Form::open(['method'=>'POST', 'action'=>'NewsController@SearchNews']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group">
                        {!! Form::text('title', null, ['class'=>'form-control inputSearch', 'id'=>'inputSearch', 'tabindex'=>'1', 'placeholder'=>'متن خود را جست و جو کنید']) !!}
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

    <!-----------table------------>

    <div class="row margin_right_2nd_title">
        <div class="col-md-3 col-md-offset-0 col-xs-6 pull-left">
            <a href="{{ route('News.create') }}"><button class="btn adv_btn pull-left">ایجاد خبر&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></button></a>
        </div>
        <div class="col-md-3 col-md-offset-0 col-xs-6 pull-right">
            &nbsp;
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 table_padding">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><h4>اخبار</h4></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $new)
                    <tr>
                        <td class="explain_cell">
                            {{ $new->title }}<br>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                                    <textarea id="news_text">{{ $new->body }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12" id="news_text_show">
                                    <textarea>{{ str_limit("$new->body", 100)}}</textarea>
                                </div>
                            </div>

                            <script>
                                $( document ).ready(function() {
                                    $('#news_text_show').html($('#news_text').text());
                                    $('#news_text').css("display","none")
                                });
                            </script>
                        </td>
                        <td class="date_cell">{{ $new->created_at->format('Y/m/d') }}</td>
                        <td class="btn_cell">

                            <div class="btn-group">
                                <a class=" dropdown-toggle" data-toggle="dropdown" href="#">
                                    <div class="navbar-header">
                                        <div class="test">
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                    <li><a  href="{{ route('News.edit', $new->id) }}">ویرایش</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['NewsController@destroy', $new->id]]) !!}
                                        {!! Form::submit('حذف', ['style'=> 'background: none; border: none', 'class'=>'pull-right', 'id'=>'delete']) !!}
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
    <div class="row">
        <div class="col-lg-8 col-lg-offset-0 col-md-8 col-md-offset-0 col-xs-11 col-xs-offset-0 padding_pagination">
            <ul class="pagination">

                {{ $news->links() }}

            </ul>
        </div>
    </div>
@endsection

@section('announcement')
    active
@endsection

@section('js')
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/managementAddShop.js"></script>
@endsection