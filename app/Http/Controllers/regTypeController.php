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
        $regtype = RegType::findOrFail($id);

        if($regtype->delete()){
            session()->flash("message","deleted");
        }else{
            session()->flash("message","not deleted");
        }

        return redirect('/regTypes');
    }
}
