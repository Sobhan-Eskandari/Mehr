<?php

namespace App\Http\Controllers;

use App\Market;
use App\Mategorty;
use App\SiteInfo;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialMarkets = Market::whereMarket_type(1)->limit(4)->get();
        $selectedMarket = Market::findOrFail($id);
        if(isset($selectedMarket->special_percentage_start)){
            $startDate = explode("-", $selectedMarket->special_percentage_start);
            if ($startDate[2] <= 9){
                $startDate[2] = '0' . $startDate[2];
            }
            if ($startDate[1] <= 9){
                $startDate[1] = '0' . $startDate[1];
            }
            $correctStartDate = implode("-", $startDate);
        }

        if(isset($selectedMarket->special_percentage_end)){
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

    public function BestMarkets(){
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
        return view('main.best', ['specialMarkets' => Market::whereMarket_type(1)->paginate(20), 'states' => $states, 'market_type' => $market_type, 'sliders' => $siteInfo->photos]);
    }

    public function FilterResults(Request $request)
    {
        $input = $request->all();

        if ($input['city'] == "شهر خود را انتخاب کنید..."){
            $input['city'] = '';
        }

        if ($input['state'] == "0"){
            $input['state'] = '';
            $input['city'] = '';
        }

        isset($input['special']) ? $input['special'] = "1" : $input['special'] = "0";

        if($input['percentage'] == 0){
            $head = 0;
            $tail = 100;
        }
        if($input['percentage'] == 1){
            $head = 0;
            $tail = 20;
        }
        if($input['percentage'] == 2){
            $head = 20;
            $tail = 40;
        }
        if($input['percentage'] == 3){
            $head = 40;
            $tail = 60;
        }
        if($input['percentage'] == 4){
            $head = 60;
            $tail = 80;
        }
        if($input['percentage'] == 5){
            $head = 80;
            $tail = 100;
        }

        $results = Market::where('state', 'like', "%{$input['state']}%")
            ->where('city', 'like', "%{$input['city']}%")
            ->whereBetween('normal_percentage', [$head, $tail])
            ->whereMarket_type($input['special'])
            ->get();

        /**
         * working until the above
         */
        if($input['market_type'] != 0){
            foreach ($results as $market){
                for($i = 0; $i < count($market->mategories); $i++){
                    if ($market->mategories[$i]['name'] == $input['market_type']){
                        $markets[] = $market;
                    }
                }
            }
        }else{
            $markets = $results;
        }

        if(!isset($markets)){
            $markets[] = [];
        }

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
//        dd($input);
        $market_type = Mategorty::pluck('name', 'name')->all();
        $specialMarkets = Market::whereMarket_type(1)->limit(4)->get();
        $siteInfo = SiteInfo::findOrFail(1);
        $sliders = $siteInfo->photos;
        return view('main.filter', compact('markets', 'specialMarkets', 'states', 'market_type', 'sliders'));
    }
}
