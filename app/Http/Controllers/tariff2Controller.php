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
     * return the related view of tariff2 listing 5 item
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
     * store new tariff and attach the tariff category to it
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
     * return related view to editing of a tariff
     */
    public function edit($id)
    {
        $tariff = Tariff2::findOrFail($id);
        return view('adminDashboard.tariff.edit2',compact('tariff'));
    }

    /**
     * store any changes to a tariff done in the edit section
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
     * delete the desired tariff based on the given id and detach any relation off it
     */
    public function destroy($id)
    {
        $tariff = Tariff2::findOrFail($id);
        $tariff->tariffs()->detach();
        if($tariff->delete()){
            session()->flash("message","deleted");
        }else{
            session()->flash("message","not deleted");
        }
        return redirect('/tariffs');
    }
}
