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
        /*
         * این اطلاعات برای نمابش در صفحه ی همه اخبار در سایت فراهم میکند
         * همچنین اطلاعات برای rolling news و همچنین عمس اسلاید ها نیز ارسال میشود
         */
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
        /*
         * نمایش صفحه ی ساخت خبر
         */
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
        /*
         * وظیفه ی ساختن خبر جدید را بر عهده دارد
         */
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
        /*
         * این تابع به نمظور نمایش اطلاعات هر خبر در سایت استفاده می شود
         * هچنین به دلیل وجود اسلبد و rolling news اطلاعات لازم برای ان بخش ها نیز ارسال میگردد
         */
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
        /*
         * اطلاعات لازم برای تغییر خبر مورد نظر به صفحه ی ادیت ارسال می کند
         */
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
        /*
         * اطلاعات جدبد را جایگزین اطلاعات قبلی در دیتابیس میکند
         */
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
        /*
         * عمل حذف موقت را انجام می دهد
         */
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
        /*
         * برای نمایش همه ی خبر ها در صفحه مورد نظر در داشبورد استفاده می شود
         */
        return view('adminDashboard.announcement.index', ['news' => News::paginate(10)]);
    }

    public function SearchNews(Request $request)
    {
        /*
         * این تابع به متظور جست وجو در اخبار استفاده می شود و نتیجه رادر صفحه ی همه اخبار داسبورد نمایش می دهد
         */
        $input = $request->all();

        $news = News::where('title','like',"%{$input['title']}%")->paginate(10);

        return view('adminDashboard.announcement.searchResult', ['news'=>$news]);
    }
}
