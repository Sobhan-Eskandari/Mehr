@extends('layouts.zhenicAdmin')

@section('title')
    ژنیک | FAQ
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    {{--<link rel="stylesheet" href="css/makeAnnouncement.css">--}}
    <link rel="stylesheet" href="css/shops.css">
@endsection

@section('css')
    css/announcement.css
@endsection

@section('content')

    @if(Session::has('deleted'))
        <div class="alert alert-danger" style="width:350px;margin-left: 80%; margin-right: 64px">
            <p>{{ session('deleted') }}</p>
        </div>
    @endif

    @if(Session::has('edited'))
        <div class="alert alert-warning" style="width:350px;margin-left: 80%; margin-right: 64px">
            <p>{{ session('edited') }}</p>
        </div>
    @endif

    @if(Session::has('created'))
        <div class="alert alert-success" style="width:350px;margin-left: 80%; margin-right: 64px">
            <p>{{ session('created') }}</p>
        </div>
    @endif

    <div class="row margin_right_2nd_title">
        <div class="col-md-3 col-md-offset-0 col-xs-4 pull-left">
            <a href="{{route('FAQ.create')}}"><button class="btn adv_btn pull-left">ایجاد سوال&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></button></a>
        </div>
        <div class="col-md-3 col-md-offset-0 col-xs-4 pull-right">
            <h4 class="list_title">سوال ها</h4>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 table_padding">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>سوال</th>
                    <th>جواب</th>
                    <th>تاریخ ایجاد</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @if($FAQs)
                    @foreach($FAQs as $FAQ)
                        <tr>
                            <td>{{ $FAQ->id }}</td>
                            <td>{{ str_limit($FAQ->question, 30) }}</td>
                            <td>{{ str_limit($FAQ->answer, 30) }}</td>
                            <td>{{ $FAQ->created_at->format('Y/m/d') }}</td>
                            <td>

                                <div class="btn-group">
                                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="navbar-header">
                                            <div class="test">
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                        <li><a  href="{{ route('FAQ.edit', $FAQ->id) }}">ویرایش</a></li>
                                        <li class="divider"></li>
                                        <li>
                                            {!! Form::open(['method'=>'DELETE','action'=>['FAQController@destroy',$FAQ->id]]) !!}
                                            {!! Form::submit('حذف', ['id'=>'delete', 'style' => 'background: none; border: none; margin-left:25px;']) !!}
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
                {{ $FAQs->links() }}
            </ul>
        </div>
    </div>

@endsection

@section('FAQ')
    active
@endsection
@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/managementAddShop.js"></script>
    <script src="js/state-city.js"></script>

@endsection