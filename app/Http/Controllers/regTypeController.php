<?php

namespace App\Http\Controllers;

use App\Http\Requests\regTypeRequest;
use App\RegType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class regTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            /*
             * این تابع برای نمایش نوع های عضویت در صفحه ی نوع عضویت از ساید بار استفاده می شود
             *همچنین در این صفحه علاوه بر انواع عضویت فرم لازم برای ساخت هم وجود دارد
             */
        return view('adminDashboard.regType.index', ['regTypes' => RegType::paginate(5)]);
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
    public function store(regTypeRequest $request)
    {
        /*
         * این تابع برای ذخیرع کردن نوع عضوبت استفاده می شود
         */
        if(RegType::create($request->all())){
            session()->flash("message","created");
        }else{
            session()->flash("message","not created");
        }
        return redirect('/regTypes');
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
         * این تابع نوع عضوبت مورد نظر را یافته و برای نمایش یه صفحه ی ادیت می فرستد
         */

        $regType = RegType::findOrFail($id);

        return view('adminDashboard.regType.edit',compact('regType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(regTypeRequest $request, $id)
    {
        /*
         * این تابع نوع عضویت تفییر یافته را به روز می کند سپس به صفحه همه ی redirect می شود
         */
        $regType = RegType::find($id);

        if($regType->update($request->all())){
            session()->flash("message","edited");
        }else{
            session()->flash("message","not edited");
        }

        return redirect('/regTypes');
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
         * این تابع نوع عضویت را مربوطه را یافته و حذف می کند
         */
        $regtype = RegType::findOrFail($id);

        if($regtype->delete()){
            session()->flash("message","deleted");
        }else{
            session()->flash("message","not deleted");
        }

        return redirect('/regTypes');
    }
}
