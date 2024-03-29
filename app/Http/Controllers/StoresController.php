<?php

namespace App\Http\Controllers;

use App\Market;
use App\Mategorty;
use App\SiteInfo;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * return the view of all markets which is useless at the moment
     */
    public function index()
    {
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

        $market_type = Mategorty::pluck('name', 'name')->all();
        $siteInfo = SiteInfo::findOrFail(1);
        return view('main.stores', ['markets' => Market::paginate(20), 'specialMarkets' => Market::whereMarket_type(1)->limit(4)->get(), 'states' => $states, 'market_type' => $market_type, 'sliders' => $siteInfo->photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * get the desired market based on the given id, find it,
     * see if it has any special discounts or not in any period and show it
     */
    public function show($id)
    {
        $specialMarkets = Market::whereMarket_type(1)->limit(4)->get();
        $selectedMarket = Market::findOrFail($id);
        if($selectedMarket->special_percentage_start != ''){
            $startDate = explode("-", $selectedMarket->special_percentage_start);
            if ($startDate[2] <= 9){
                $startDate[2] = '0' . $startDate[2];
            }
            if ($startDate[1] <= 9){
                $startDate[1] = '0' . $startDate[1];
            }
            $correctStartDate = implode("-", $startDate);
        }

        if($selectedMarket->special_percentage_end != ''){
            $endDate = explode("-", $selectedMarket->special_percentage_end);
            if ($endDate[2] <= 9){
                $endDate[2] = '0' . $endDate[2];
            }
            if ($endDate[1] <= 9){
                $endDate[1] = '0' . $endDate[1];
            }
            $correctEndDate = implode("-", $endDate);
        }
        return view('main.showStore', compact('selectedMarket', 'specialMarkets', 'correctStartDate', 'correctEndDate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
