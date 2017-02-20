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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
