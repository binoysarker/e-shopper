<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = new Category;
        $subCategories= new SubCategory;
        $categories = $categories->all();
        $subCategories = $subCategories->all();
        return view('subCategory.create',compact('categories','subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id'   =>  'required|numeric',
            'sub_category_name'   =>  'required|max:20'
        ]);
        $subCategory = new SubCategory;
        $subCategory->category_id = $request->category_id;
        $subCategory->sub_category_name = $request->sub_category_name;
        $subCategory->save();
        session()->flash('message','Data Inserted Successfuly');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        return view('subCategory.edit',compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request,[
            'sub_category_name'  =>  'required|max:15',
            'category_id'  =>  'required|numeric'
        ]);
        $subCategories = SubCategory::find($subCategory)->first();
        $subCategories->update(request(['category_id','sub_category_name']));
        session()->flash('message','Data Updated Successfuly');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)

    {
        $subCategoryId = $subCategory['id'];
        SubCategory::where('id',$subCategoryId)->delete();
        Brand::where('sub_category_id',$subCategoryId)->delete();
        session()->flash('message','Data Deleted SussessFuly');
        return redirect('/admin');
    }
}
