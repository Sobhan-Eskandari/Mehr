<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tariff2Request;
use App\RegType;
use App\Tariff2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class tariff2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminDashboard.tariff.index2', ['tariffs' => Tariff2::paginate(5)]);
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
    public function store(Tariff2Request $request)
    {
        if($tariff2 = Tariff2::create($request->all())){
            $tariff2->tariffs()->attach($request->tariff);
            session()->flash("message","created");
        }else{
            session()->flash("message","not created");
        }
        return redirect('/tariffs');
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
        $tariff = Tariff2::findOrFail($id);

        return view('adminDashboard.tariff.edit2',compact('tariff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tariff2Request $request, $id)
    {
        $tariff = Tariff2::find($id);
        $tariff->tariffs()->sync($request->tariff);
        if($tariff->update($request->all())){
            session()->flash("message","edited");
        }else{
            session()->flash("message","not edited");
        }

        return redirect('/tariffs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tariff = Tariff2::findOrFail($id);
//        $tariif = Tariff::findOrFail($id);
        $tariff->tariffs()->detach();
        if($tariff->delete()){
            session()->flash("message","deleted");
        }else{
            session()->flash("message","not deleted");
        }

        return redirect('/tariffs');

    }
}
