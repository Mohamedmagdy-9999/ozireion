<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = SubCategory::latest()->get();
        return view('admin.sub_category.index', compact('subs'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'category_id'=> 'required',
        ]);

        $sub = new SubCategory();
        $sub->name_en = $request->name_en;
        $sub->name_ar = $request->name_ar;
        $sub->category_id = $request->category_id;
        $sub->save();

        return back()->with('message','inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = SubCategory::findOrFail($id);
        return view('admin.sub_category.edit', compact('sub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'category_id'=> 'required',
        ]);

        $sub =  SubCategory::findOrFail($id);
        $sub->name_en = $request->name_en;
        $sub->name_ar = $request->name_ar;
        $sub->category_id = $request->category_id;
        $sub->save();

        return back()->with('message','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub =  SubCategory::findOrFail($id);
        $sub->delete();
        return back()->with('message','deleted successfully');
    }
}
