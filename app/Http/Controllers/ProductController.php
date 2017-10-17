<?php

namespace App\Http\Controllers;

use App\Brand;
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
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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
        $brands = Brand::all();
        return view('products.create',compact('categories','subCategories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        code for the click count
        if ($request->has('click_count')){
            Product::where('id',$request->product_id)->increment('click_count');
            return redirect('/product_details/'.$request->product_id);
        }
        $this->validate($request,[
            'category_id'   =>  'required|numeric',
            'sub_category_id'   =>  'required|numeric',
            'product_name'   =>  'required|max:100',
            'product_brief'   =>  'required|max:191',
            'product_description'   =>  'required',
            'product_price'   =>  'required|max:10',
            'quantity'   =>  'required|numeric',
            'condition'   =>  'required|max:10',
            'brand_name'   =>  'required|max:10',
            'reorder_level'   =>  'required|numeric',
            'is_featured'   =>  'required',
            'product_file'   =>  'required|max:100'
        ]);
        $products = new Product;
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id;
        $products->product_name = $request->product_name;
        $products->product_brief = $request->product_brief;
        $products->product_description = $request->product_description;
        $products->product_price = $request->product_price;
        $products->quantity = $request->quantity;
        $products->reorder_level = $request->reorder_level;
        $products->is_featured = $request->is_featured;
        $products->condition = $request->condition;
        $products->brand_name = $request->brand_name;
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
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('products.edit',compact('product','categories','subCategories','brands'));
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
//        return $request->all();
//        return $request->product_file;
//        return $request->file('product-file');
        $getId = $product['id'];
        $products = Product::find($getId);
        if ($request->hasFile('product_file')){
            $this->validate($request,[
                'category_id'   =>  'required|numeric',
                'sub_category_id'   =>  'required|numeric',
                'product_name'   =>  'required|max:100',
                'product_brief'   =>  'required|max:191',
                'product_description'   =>  'required',
                'product_price'   =>  'required|max:10',
                'reorder_level'   =>  'required|numeric',
                'is_featured'   =>  'required',
                'quantity'   =>  'required|numeric',
                'condition'   =>  'required|max:10',
                'brand_name'   =>  'required|max:10',
                'product_file'   =>  'required|max:100'

            ]);
            return $products;

            unlink("".$products->product_file);
            $image = $request->file('product_file');
            if ($image) {
                $imageName = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $full_image_name = $imageName . '.' . $ext;
                $upload_path = 'upload/';
                $image_url = $upload_path . $full_image_name;
                $success = $image->move($upload_path, $full_image_name);
                if ($success) {
                    $request->product_file = $image_url;
                    $products->update([
                        'category_id'       =>  $request->category_id,
                        'sub_category_id'   =>  $request->sub_category_id,
                        'product_name'      =>  $request->product_name,
                        'product_brief'     =>  $request->product_brief,
                        'product_description'=> $request->product_description,
                        'product_price'     =>  $request->product_price,
                        'is_featured'       =>  $request->is_featured,
                        'quantity'          =>  $request->quantity,
                        'condition'         =>  $request->condition,
                        'reorder_level'     =>  $request->reorder_level,
                        'brand_name'        =>  $request->brand_name,
                        'product_file'      =>  $image_url
                    ]);
                    session()->flash('message', 'Data Inserted Successfully');
                    return redirect('/admin');
                } else {
                    echo 'No file uploaded';
                }
            }

        }
        if(preg_match('(upload)',$request->product_file)){

            $products->update(\request(['category_id','sub_category_id','product_name','product_brief','product_description','product_price','quantity','reorder_level','is_featured','condition','brand_name','product_file']));
            session()->flash('message','Data Updated Successfully');
            return redirect('/admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $getId = $product['id'];
        $products = Product::where('id',$getId);
        unlink(''.$product['product_file']);
        $products->delete();
        session()->flash('message','Data Deleted Successfuly');
        return redirect('/admin');
    }
}
