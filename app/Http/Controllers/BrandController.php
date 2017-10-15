<?php

namespace App\Http\Controllers;

use App\Brand;
use App\SubCategory;
use Illuminate\Http\Request;

class BrandController extends Controller
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
        $subCategories = SubCategory::all();
        return view('brand.create',compact('subCategories'));
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
            'sub_category_id'   =>  'required|numeric',
            'BrandName'   =>  'required|max:55'
        ]);
        $brands = new Brand;
        $brands->sub_category_id = $request->sub_category_id;
        $brands->BrandName = $request->BrandName;
        $brands->save();
        session()->flash('message','Data Inserted Successfuly');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('subCategory.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request,[
            'BrandName'  =>  'required|max:15',
            'sub_category_id'  =>  'required|numeric'
        ]);
        $brands = SubCategory::find($brand)->first();
        $brands->update(request(['sub_category_id','BrandName']));
        session()->flash('message','Data Updated Successfuly');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brandId = $brand['id'];
        Brand::where('id',$brandId)->delete();
        session()->flash('message','Data Deleted SussessFuly');
        return redirect('/admin');
    }
}
