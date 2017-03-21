<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\categoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * return the view of systemic category showing 5 in each page
         */
        return view('adminDashboard.systemicCategory.index', ['categories' => Category::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryRequest $request)
    {
        /**
         * get all inputs after validating using categoryRequest and store it in categories table
         */
        if(Category::create($request->all())){
            session()->flash("message","created");
        }else{
            session()->flash("message","not created");
        }
        return redirect('/systemicCategories');
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
        /**
         * return the view of editing systemic category page
         */
        $category = Category::findOrFail($id);
        return view('adminDashboard.systemicCategory.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(categoryRequest $request, $id)
    {
        /**
         * get all inputs after validating using categoryRequest and update the desired systemic category
         */
        $category = Category::find($id);
        if($category->update($request->all())){
            session()->flash("message","edited");
        }else{
            session()->flash("message","not edited");
        }
        return redirect('/systemicCategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * find the systemic category and delete it
         */
        $category = Category::findOrFail($id);
        if($category->delete()){
            session()->flash("message","deleted");
        }else{
            session()->flash("message","not deleted");
        }
        return redirect('/systemicCategories');
    }
}
