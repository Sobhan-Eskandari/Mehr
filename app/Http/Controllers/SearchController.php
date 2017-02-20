<?php

namespace App\Http\Controllers;

use App\Market;
use App\Mategorty;
use App\SiteInfo;
use App\Tag;
use App\track;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class SearchController extends Controller
{
    public function search(Request $request){
        $keys = $request->search;
        $keys = trim($keys);
        $key = explode(" ",$keys);
        foreach ($key as $ke) {
            $tracks = track::Where('name', 'like', "%{$ke}%")->get();
            if (count($tracks) > 0) {
                foreach ($tracks as $track) {
                    $track->count = $track->count + 1;
                    $track->save();
                }
            } else {
                track::create(['name' => $ke, 'count' => '1']);
            }
        }
        if(!isset($key[1])){
            $key[1]=$key[0];
        }
        if(!isset($key[2])){
            $key[2]=$key[0];
        }
        //dd($key);
        $marketsName = Market::
        Where('market_name', 'like', "%{$key[0]}%")
            ->orWhere('state', 'like', "%{$key[0]}%")
            ->orWhere('city', 'like', "%{$key[0]}%")
            ->orWhere('market_name', 'like', "%{$key[1]}%")
            ->orWhere('state', 'like', "%{$key[1]}%")
            ->orWhere('city', 'like', "%{$key[1]}%")
            ->orWhere('market_name', 'like', "%{$key[2]}%")
            ->orWhere('state', 'like', "%{$key[2]}%")
            ->orWhere('city', 'like', "%{$key[2]}%")
            ->get();
        $tags = Tag::
        Where('name', 'like', "%{$key[0]}%")->
        orWhere('name', 'like', "%{$key[1]}%")->
        orWhere('name', 'like', "%{$key[2]}%")->
        get();
        $mategories = Mategorty::Where('name', 'like', "%{$key[0]}%")
            ->orWhere('name', 'like', "%{$key[1]}%")
            ->orWhere('name', 'like', "%{$key[2]}%")
            ->get();
        $markets = collect();
        if(count($marketsName)>0){
            $markets = $marketsName;
        }

        if(count($tags)>0) {
            foreach ($tags as $tag) {
                $marketss = $tag->markets()->get();
                $markets = $markets->merge($marketss);
            }
        }
        if(count($mategories)>0) {
            foreach ($mategories as $mategory) {
                $marketss = $mategory->markets()->get();
                $markets = $markets->merge($marketss);
            }
        }
        $market_type = Mategorty::pluck('name', 'name')->all();
        $states = [
            '0'=>'انتخاب کنید',
            'آذربایجان شرقی'=>'آذربایجان شرقی',
            'آذربایجان غربی'=>'آذربایجان غربی',
            'اردبیل'=>'اردبیل',
            'اصفهان'=>'اصفهان',
            'البرز'=>'البرز',
            'ایلام'=>'ایلام',
            'بوشهر'=>'بوشهر',
            'تهران'=>'تهران',
            'چهارمحال و بختیاری'=>'چهارمحال و بختیاری',
            'خراسان جنوبی'=>'خراسان جنوبی',
            'خراسان رضوی'=>'خراسان رضوی',
            'خراسان شمالی'=>'خراسان شمالی',
            'خوزستان'=>'خوزستان',
            'زنجان'=>'زنجان',
            'سمنان'=>'سمنان',
            'سیستان و بلوچستان'=>'سیستان و بلوچستان',
            'فارس'=>'فارس',
            'قزوین'=>'قزوین',
            'قم'=>'قم',
            'کردستان'=>'کردستان',
            'کرمان'=>'کرمان',
            'کرمانشاه'=>'کرمانشاه',
            'کهکیلویه و بویراحمد'=>'کهکیلویه و بویراحمد',
            'گلستان'=>'گلستان',
            'گیلان'=>'گیلان',
            'لرستان'=>'لرستان',
            'مازندران'=>'مازندران',
            'مرکزی'=>'مرکزی',
            'هرمزگان'=>'هرمزگان',
            'همدان'=>'همدان',
            'یزد'=>'یزد'
        ];
        $markets = new paginator($markets,20,1);
        $specialMarkets = Market::whereMarket_type(1)->limit(4)->get();
        $siteInfo = SiteInfo::findOrFail(1);
        $sliders = $siteInfo->photos;
        return view('main.stores',compact('markets','market_type','states','specialMarkets', 'sliders'));
    }
    public function searche(){
        return redirect('/stores');
    }
       public function json(Request $request){
        return response()->json([
    'name' => 'Abigail',
    'state' => 'CA'
    ]);
}
}
