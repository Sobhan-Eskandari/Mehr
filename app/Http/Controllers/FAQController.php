<?php

namespace App\Http\Controllers;

use App\FAQ;
use App\Http\Requests\FAQRequest;
use App\SiteInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * این تابع همه سوالات را پیدامی کند دسته بندی می کند در اخر برای نمایش
         *  در در FAQ دیتا را به ان صفخه می فرستد
         */
        $FAQs = FAQ::paginate(10);
        return view('adminDashboard.FAQ.index', compact('FAQs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /*
        * این تابع به منظور نمابش صفحه ی ساخت faq مورد استفاده قرار می گیرد
        */
        return view('adminDashboard.FAQ.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        $input = $request->all();
/*
 * این تابع با استفاده از مدل FAQ‌ مقدار دیتا ی جدیدی را در دیتا بیس ذخیره میکند سپس به صفحه ی همه ی faq ها redirect می شود
 */
        $FAQ = FAQ::create($input);

        Session::flash('created', 'سوال ساخته شد');

        return redirect('/FAQ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
         * این تابع با استفاده از مدل FAQ دیتای مورد نظر را پیدا میکند و برای تغییر به صفحه ی ادیت مورد نظر ارسال میکند
         */
        $FAQ = FAQ::findOrFail($id);
        return view('adminDashboard.FAQ.edit', compact('FAQ'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request, $id)
    {
        /*
         * این تابع faq‌مورد نظر را پیدا می کند و اطلاعات جدید
         *  را جایگزین اطلاعات قبلی میکند سپس به صفحه ی همه ی faq ها redirect میکند
         */
        $input = $request->all();

        FAQ::findOrFail($id)->update($input);

        Session::flash('edited', 'سوال ویرایش شد');

        return redirect('/FAQ');
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
         * در این تابع faq به صورت موقت پاک می شود و
         * زمان اپدیت و حذف موقت sync می شود سپس به صفحه ی همه ی faqها redirect می شود
         */
        FAQ::findOrFail($id)->delete();
        $FAQ = FAQ::withTrashed()->whereId($id)->first();
        $allFAQ = FAQ::withTrashed()->whereId($id)->first();
        $FAQ->updated_at = $allFAQ->deleted_at;
        $FAQ->save();

        Session::flash('deleted', 'سوال پاک شد');

        return redirect('/FAQ');
    }

    public function FAQView()
    {
        /*
         * این تابع برای نمایش همه faq ها در صفحه مربوط به خود در سایت استفاده می شود
         */
        $FAQs = FAQ::all();
        return view('main.FAQ', compact('FAQs'));
    }
}
