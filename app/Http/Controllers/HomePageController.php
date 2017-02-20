<?php

namespace App\Http\Controllers;

use App\Market;
use App\News;
use App\SiteInfo;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        $specialMarkets = Market::whereMarket_type(1)->limit(4)->get();
        $normalMarkets = Market::whereMarket_type(0)->limit(6)->get();
        $rollingNews = News::orderBy('created_at', 'desc')->limit(3)->get();
        $siteInfo = SiteInfo::findOrFail(1);
        $sliders = $siteInfo->photos;
        return view('main.index', compact('specialMarkets', 'sliders', 'normalMarkets', 'rollingNews'));
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

    public function FAQView()
    {
        $siteInfo = SiteInfo::findOrFail(1);
        $sliders = $siteInfo->photos;
        return view('main.FAQ', compact('sliders'));
    }
}
