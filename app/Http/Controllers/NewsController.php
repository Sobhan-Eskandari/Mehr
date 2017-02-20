<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\News;
use App\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteInfo = SiteInfo::findOrFail(1);
        return view('main.allNews', ['news' => News::paginate(12), 'rollingNews' => News::orderBy('created_at', 'desc')->limit(3)->get(), 'sliders' => $siteInfo->photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminDashboard.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $input = $request->all();

        News::create($input);

        return redirect('/NewsDash');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $rollingNews = News::orderBy('created_at', 'desc')->limit(3)->get();
        $siteInfo = SiteInfo::findOrFail(1);
        $sliders = $siteInfo->photos;
        return view('main.showNews', compact('news', 'rollingNews', 'sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('adminDashboard.announcement.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $input = $request->all();

        News::findOrFail($id)->update($input);

        Session::flash('edited_news', 'خبر ویرایش شد');

        return redirect('/NewsDash');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        $news = News::withTrashed()->whereId($id)->first();
        $allNews = News::withTrashed()->whereId($id)->first();
        $news->updated_at = $allNews->deleted_at;
        $news->save();

        Session::flash('deleted_news', 'خبر پاک شد');

        return redirect('/NewsDash');
    }

    public function DashIndex()
    {
        return view('adminDashboard.announcement.index', ['news' => News::paginate(10)]);
    }

    public function SearchNews(Request $request)
    {
        $input = $request->all();

        $news = News::where('title','like',"%{$input['title']}%")->paginate(10);

        return view('adminDashboard.announcement.searchResult', ['news'=>$news]);
    }
}
