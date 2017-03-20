<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketCategoryRequest;
use App\Market;
use App\Mategorty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class mategory extends Controller
{
    /**
     * Display a listing of the resource.
     درابن controller از مدل mategorty  استفاده شده است
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         *  همه ی دسته بندهای فرشگاه ها در این تابع پیدا میشود به صورت ۵تایی دسته بندی شده و برای نمابش در صفحه ی همه دسته بندی ها فرستاده میشود
         * هچنین در این صفحه فرم لازم برای ساخت دسته بندی موجود است
         */
        return view('adminDashboard.marketCategory.index',['marketCategories' => Mategorty::paginate(5)]);
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
    public function store(MarketCategoryRequest $request)
    {
        /*
         * در این تابع دسته بندی ساخته می شود و سپس به
         *  صفخه ی همه ی دسته بندی ها redirect می شود
         */
        if(Mategorty::create($request->all())){
            session()->flash("message","created");
        }else{
            session()->flash("message","not created");
        }
        return redirect('/marketCategories');
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
         * این تابع به منظور نمابش صفحه حاوی اطلاعات دسته بندی مورد نظر برای ادیت استفاده می شود
         */
        $marketCategory = Mategorty::findOrFail($id);

        return view('adminDashboard.marketCategory.edit',compact('marketCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarketCategoryRequest $request, $id)
    {
        /*
         * این تابع برای اپدیت اطلاعات تغییر گرده استفاده می شود سپس به صفحه
         *  ی همه ی دسته بندی ها redirect میشود
         */
        $marketCategory = Mategorty::find($id);

        if($marketCategory->update($request->all())){
            session()->flash("message","edited");
        }else{
            session()->flash("message","not edited");
        }

        return redirect('/marketCategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marketCategory = Mategorty::findOrFail($id);

        if($marketCategory->delete()){
            session()->flash("message","deleted");
        }else{
            session()->flash("message","not deleted");
        }

        return redirect('/marketCategories');
    }
}
