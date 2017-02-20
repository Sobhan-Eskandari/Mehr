@extends('layouts.zhenicSite')

@section('title')
    ژنیک | {{ $selectedMarket->market_name }}
@endsection

@section('js2')
    <script src="../js/jquery-2.1.4.min.js"></script>
@endsection

@section('css')
    <link href="../css/post2.css" rel="stylesheet" type="text/css" />
@endsection

@section('contactUs')
    {{ route('contactUs') }}
@endsection

@section('storeActive')
    active
@endsection

@section('content')


    <div class="container" id="main_container">
        <div class="row">
            <div class="col-lg-12">
                <!----------- Top Header of Store ------------->
                <div id="top_container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left" id="takhfif_btn">
                            <span class="discunt_btn_img"><span class="percent">{{ $selectedMarket->normal_percentage }}٪</span>&nbsp;&nbsp;تخفیف</span>
                        </div>
                        <div id="store_name" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h2>{{ $selectedMarket->market_name }}</h2>
                            <hr>
                        </div>
                        <div id="loc_image" class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
                            <img id="#mapbtn" class="img-responsive" src="../images/location-icone%20copy.png">
                        </div>
                    </div>
                </div>

                <!----------- Takhfife Vizhe ------------->
                @if(isset($correctStartDate) && isset($correctEndDate))
                    @if($correctStartDate <= jDate::forge('now')->format('date') && $correctEndDate >= jDate::forge('now')->format('date'))
                    <div class="row" id="takhfif_bar">
                        <div class="col-lg-7 col-lg-offset-4 col-md-7 col-md-offset-4 col-xs-10 col-xs-offset-1">
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <p>شروع تخفیف از تاریخ {{ $correctStartDate }} تا تاریخ {{ $correctEndDate }}</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col--3" id="takhfif_holder">
                                <p>تخفیف ویژه</p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endif
                <!----------- Gallery of Images ------------->
                <div id="gallery" class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8 col-lg-offset-0 col-md-offset-0 col-sm-offset-0 col-xs-offset-2">
                        @if(count($selectedMarket->photos) >= 1)
                            <img id="img1" class="img-responsive gall_thumb" src="../marketsPhotos/{{ $selectedMarket->photos[0]['address'] }}">
                        @else
                            <img id="img1" class="img-responsive gall_thumb" src="https://placehold.it/750x500">
                        @endif
                        @if(count($selectedMarket->photos) >= 2)
                            <img id="img2" class="img-responsive gall_thumb" src="../marketsPhotos/{{ $selectedMarket->photos[1]['address'] }}">
                        @else
                            <img id="img2" class="img-responsive gall_thumb" src="https://placehold.it/750x500">
                        @endif
                        @if(count($selectedMarket->photos) >= 3)
                            <img id="img3" class="img-responsive gall_thumb" src="../marketsPhotos/{{ $selectedMarket->photos[2]['address'] }}">
                        @else
                            <img id="img3" class="img-responsive gall_thumb" src="https://placehold.it/750x500">
                        @endif
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10 col-lg-offset-0 col-md-offset-0 col-sm-offset-0 col-xs-offset-1">
                        @if(count($selectedMarket->photos) >= 1)
                            <img id="gall_image" class="img-responsive" src="../marketsPhotos/{{ $selectedMarket->photos[0]['address'] }}">
                        @else
                            <img id="gall_image" class="img-responsive" src="https://placehold.it/750x500">
                        @endif
                    </div>

                    <!----------- Big Modal of Gallery ------------->
                    <div id="myModal" class="modal">

                        <!-- The Close Button -->
                        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                        <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                        <div id="caption"></div>
                    </div>
                </div>

                <!----------- Text of Store ------------->
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                        <textarea id="news_text">{{ $selectedMarket->text }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12" id="news_text_show">
                        <textarea>{{ $selectedMarket->text }}</textarea>
                    </div>
                </div>
            </div>

            <script>
                $( document ).ready(function() {
                    $('#news_text_show').html($('#news_text').text());
                    $('#news_text').css("display","none")
                });
            </script>
                {{--<div class="row">--}}
                    {{--<div id="store_text" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                        {{--<p>{{ $selectedMarket->text }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <hr class="seprator_line">

                <!----------- Address of Store ------------->
                <div id="address_container">
                    <div class="row">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 address">
                            <p>{{ $selectedMarket->address }}</p>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 address">
                            <img src="../images/location-icone%20copy.png">
                        </div>
                    </div>
                </div>

                <!----------- Address of Store ------------->
                <div id="address_container">
                    <div class="row">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 address">
                            <p>تلفن تماس: {{ $selectedMarket->market_tel }}</p>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 address">
                            <img src="../images/telephone-icone.png">
                        </div>
                    </div>
                </div>

                <!----------- Google Maps ------------->
                <div class="container row">
                    <div class="col-lg-12">
                        <div id="map" style="width:100%;height:500px">
                            <script>
                                //                        document.getElementById("inputWidth").val();
                                //                        document.getElementById("inputHeight").val();
                                //                        var mapCanvas = document.getElementById("map");
                                //                        var mapOptions = {
                                //                            center: new google.maps.LatLng(37.463909, 49.479862),
                                //                            zoom: 14
                                //                        };
                                // map = new google.maps.Map(mapCanvas, mapOptions);
                                $( document ).ready(function() {

                                });
                                $( document ).ready(function() {
                                    var lng = {{$selectedMarket->longitude}} + 0 ;
                                    var lat = {{$selectedMarket->latitude}} + 0 ;
                                    window.showStore(lat,lng);
                                });

                            </script>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <!--BestShopping(start)-->

    <div class="box_card">
        <br>
        <!--shopping title-->
        <div class="container">
            <div class="row">
                <h2 class="best_title">فروشگاه های برتر ما</h2>
            </div>
        </div>

        <br>
        <br>
        <br>
        <!--shopping card-->
        <div class="container-fluid space_4_card">
            <div class="row">

                @foreach($specialMarkets as $market)
                <div class="col-md-3 col-xs-6 thumbnail padding">
                    <div class="opac_layer">
                        @if(count($market->photos) >= 1)
                            <img src="../marketsPhotos/{{ $market->photos[0]['address'] }}" class="img-fluid radious_img" alt="Responsive image">
                        @else
                            <img src="https://placehold.it/200x200" class="img-fluid radious_img" alt="Responsive image">
                        @endif
                        <div class="row">
                            <div class="col-xs-12 ">
                                <div class="back_layer">
                                    <h2 class="name_shopping">{{ $market->market_name }}</h2>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-6 pull-right">
                                            <h3 class="detail_title"><a href="{{ route('stores.show', $market->id) }}" class="detail_title">مشاهده جزییات</a></h3>
                                        </div>

                                        <div class="col-xs-6 pull-left btn_upper">
                                            <span class="discunt_btn_img"><span class="percent">{{ $market->normal_percentage }}%</span>&nbsp;&nbsp;تخفیف</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-3 col-xs-6 col-xs-offset-1">

                    <a href="{{ route('BestMarkets') }}"><button class="btn first_shopping_btn">
                        فروشگاه های برتر
                    </button></a>

                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
    </div>

@endsection

@section('js')
    <script src="../../js/showStore.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyD8ClNTU8WBKdBG8qwgaCZA5fHjWitwV-M &callback=showStore">
    </script>
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
@endsection