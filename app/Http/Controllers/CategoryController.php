<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
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
            'categoryName'  =>  'required|max:15'
        ]);
        $categories = new Category;
        $categories->user_id = $request->user_id;
        $categories->categoryName = $request->categoryName;
        $categories->save();
        session()->flash('message','Data Inserted Successfuly');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $this->validate($request,[
            'categoryName'  =>  'required|max:15'
        ]);
        $categories = Category::find($category)->first();
        $categories->update(request(['user_id','categoryName']));
        session()->flash('message','Data Updated Successfuly');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $categoryId = $category['id'];
        SubCategory::where('category_id',$categoryId)->delete();
        Category::where('id',$categoryId)->delete();
        session()->flash('message','Data Deleted SussessFuly');
        return redirect('/admin');
    }
}