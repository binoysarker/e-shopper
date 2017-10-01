<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('products.create',compact('categories','subCategories'));
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
            'sub_category_id'   =>  'required|numeric',
            'productName'   =>  'required|max:100',
            'productBrief'   =>  'required|max:191',
            'productDescription'   =>  'required',
            'productPrice'   =>  'required|max:10',
            'product_file'   =>  'required|max:100'
        ]);
        $products = new Product;
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id;
        $products->productName = $request->productName;
        $products->productBrief = $request->productBrief;
        $products->productDescription = $request->productDescription;
        $products->productPrice = $request->productPrice;
//      processing the fie for product
        if ($request->hasFile('product_file')){
            $image = $request->file('product_file');
            if ($image){
                $imageName = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $full_image_name = $imageName.'.'.$ext;
                $upload_path = 'upload/';
                $image_url = $upload_path.$full_image_name;
                $success = $image->move($upload_path,$full_image_name);
                if ($success){
                    $products->product_file = $image_url;
                    $products->save();
                    session()->flash('message','Data Inserted Successfully');
                    return redirect('/admin');
                }
                else{
                    echo 'No file uploaded';
                }
            }
            else{
                $products->save();
                session()->flash('message','Data Inserted Successfully');
                return redirect('/admin');
            }
        }
        $products->save();
        session()->flash('message','Data Inserted Successfuly');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
