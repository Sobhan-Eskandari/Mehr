<?php
use Illuminate\Support\Facades\DB;

$_GET['id'] = $number;
$cell = $_GET['id'];
/***********************************************************************************
      Sample code for working with webservices and PHP 5+
					
***********************************************************************************/
$string = "";
$password = "";
$users = DB::select('select * from users where cell_1 = ?', [$cell]);
//dd($users);
foreach ($users as $user){
    if($user->cell_1 = $cell){
        $string = str_random(8);
        $password = $string;
        $string = bcrypt($string);
        $affected = DB::update('update users set password = ? where id = ?', [$string,$user->id]);
//        $users->password = bcrypt($string);
//        $users->save();
       // dd("this view");
        // echo $user->cell_1;
       // return redirect('/findUser');
    }
}
function to_long_xml($longVal) {
  return '<long>' . $longVal . '</long>';
}
function from_long_xml($xmlFragmentString) {
  return (string)strip_tags($xmlFragmentString);
}
$status= array();
$RecId= array();
$client = new SoapClient("http://sms.navid-soft.ir/API/Send.asmx?WSDL",array(
  'typemap' => array(
    array(
      'type_ns' => 'http://www.w3.org/2001/XMLSchema',
      'type_name' => 'long',
      'to_xml' => 'to_long_xml',
      'from_xml' => 'from_long_xml',
    ),
  ),
));
$array[] = $cell;
//array('09362818097');
$params = new stdClass();
$params->username="ZhenicCard";
$params->password='zhenic123456';
$params->from='30007477';
$params->to = $array;
$params->text= $password;
$params->flash=false;
$params->udh='';
//$params->status=$Status;
//$params->recId=$RecId;
$result= $client->SendSms($params);
$SendResult=$result->SendSmsResult;
//$RecId=(array)$result->recId->long;

//print_r($SendResult);
//echo '</br>---';
//
//echo '<pre>RecId: ';
//print_r($RecId);
//echo '</pre>';


?>
@extends('layouts.zhenicSite')

@section('title')
    ژنیک | درباره ژنیک
@endsection

@section('js2')
    <script src="js/jquery-2.1.4.min.js"></script>
@endsection

@section('css')
    <link href="css/aboutZhenic.css" rel="stylesheet" type="text/css" />
    <link href="css/homePage.css" rel="stylesheet" type="text/css" />
@endsection

@section('contactUs')
    {{ route('contactUs') }}
@endsection

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12" id="backtohome">
                <a href="{{url('/login')}}"><h4>بازگشت به خانه</h4></a>
            </div>
        </div>
    </div>
    <div class="row" style="">

    </div>
@endsection

@section('js')
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
@endsection