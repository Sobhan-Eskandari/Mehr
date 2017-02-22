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
        $FAQs = FAQ::all();
        return view('main.FAQ', compact('FAQs'));
    }
}
