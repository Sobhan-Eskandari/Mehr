<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SoapClient;
use stdClass;

class sms extends Controller
{
    public function findUser(Request $request){
        //dd($request);
        $cell = $request->all();
        $user = User::where('cell_1',$cell['cell'])->first();
        if($user){
            //$user->first_name;
            $number = $user->cell_1;
            return view('sms.send2',compact('number'));
            // return redirect()->route('sms', ['number' => $user->cell_1]);
            //return view('sms.send2',compact('user'));
        }else{
            session()->flash("message","شماره تماس یافت نشد");
            return redirect('/findUser');
        }
    }
    public function findUUser(){
        return view('sms.findUser');
    }
    public function sms($number){

        return view('sms.send2');
    }
    public function sendSms(Request $request)
    {

        $string = "";
        $number = $request->cell;
        $users = User::where('cell_1',$number)->first();
        if ($users) {
            if ($users->cell_1 == $number) {
                $string = str_random(8);
                $users->password = bcrypt($string);
                $users->save();
            }
            function to_long_xml($longVal)
            {
                return '<long>' . $longVal . '</long>';
            }

            function from_long_xml($xmlFragmentString)
            {
                return (string)strip_tags($xmlFragmentString);
            }
            $number=$number + 45545;
            // dd($number);
            $status = array();
            $RecId = array();
            $client = new SoapClient("http://sms.navid-soft.ir/API/Send.asmx?WSDL", array(
                'typemap' => array(
                    array(
                        'type_ns' => 'http://www.w3.org/2001/XMLSchema',
                        'type_name' => 'long',
                        'to_xml' => 'to_long_xml',
                        'from_xml' => 'from_long_xml',
                    ),
                ),
            ));
//array('09362818097');
            $params = new stdClass();
            $params->username = "ZhenicCard";
            $params->password = 'zhenic123456';
            $params->from = '30007477';
            $params->to = array("$users->cell_1") ;
            $params->text = $string . " رمز عبور جدید شما";
            $params->flash = false;
            $params->udh = '';
//$params->status=$Status;
//$params->recId=$RecId;

            $result = $client->SendSms($params);
            $SendResult = $result->SendSmsResult;

//$RecId=(array)$result->recId->long;


//print_r($SendResult);
//echo '</br>---';
//
//echo '<pre>RecId: ';
//print_r($RecId);
//echo '</pre>';
//            session()->flash('message', "رمز عبور جدید ارسال شد.");
//            return redirect('/login');
            // echo "true";
        } else {
            //echo "false";
            session()->flash('message', "شماره وارد شده صحیح نیست.");
            return redirect('/findUser');
        }
    }
}
