@extends('layouts.master')
@section('title')
    E-Shopper| Home
@endsection
@section('slider')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                            <li data-target="#slider-carousel" data-slide-to="3"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="" class="girl img-responsive" style="width: 484px;height: 441px" alt="" />
                                    <img src="{{asset('images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            @foreach($featureProduct as $picture)
                            <div class="item ">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset(''.$picture->product_file)}}" style="width: 484px;height: 441px" class="girl img-responsive" alt="" />
                                    <img src="{{asset('images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->
@endsection
@section('content')

    @if(isset($subCategories))
        <div class="features_items" id="displaySubCategory"><!--Item according to the SubCategory-->
            <h2 class="title text-center">Items According to the SubCategory</h2>
            @foreach($subCategories as $subCategory)
                @foreach($subCategory->products as $product)
                <div class="col-sm-4" >
                <div class="product-image-wrapper">
                    <div class="single-products" id="singleProduct">
                        <div class="productinfo text-center">
                            <img src="{{asset(''.$product->product_file)}}" alt="" />
                            <h2>${{$product->product_price}}</h2>
                            <p><strong>{{str_limit($product->product_brief,40,'...')}}</strong></p>

                            <a  href="{{url('/addToCart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{$product->product_price}}</h2>
                                <p>{{$product->product_brief}}</p>

                                <form action="{{url('admin/product')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="clickCount" value="0">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach


        </div><!--Item according to the SubCategory-->
    @endif

    @if(isset($getProductsByBrand))
        <div class="features_items" id="displayProductByBrand"><!--Item according to the Brand-->
            <h2 class="title text-center">Items According to the Brand</h2>
            @foreach($getProductsByBrand as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset(''.$product->product_file)}}" alt="" />
                                    <h2>${{$product->product_price}}</h2>
                                    <p>{{str_limit($product->product_brief,40,'...')}}</p>
                                    <a href="{{url('/addToCart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{$product->product_price}}</h2>
                                        <p>{{$product->product_brief}}</p>

                                        <form action="{{url('admin/product')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="clickCount" value="0">
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            @endforeach


        </div><!--Item according to the Brand-->
    @endif

    <div class="category-tab" id="CategorySection"><!--Item according to the Category-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @foreach($categories as $category)
                    <li ><a  href="/?CategoryName={{$category->category_name}}" >{{$category->category_name}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="tab-content" id="displayCategory">
            @foreach($getProductsByCategory as $category)
                <div class="tab-pane fade active in" id="{{$category->category_name}}" >
                    <h2 class="text-info">Products under "{{$category->category_name}}" Category</h2>
                    @foreach($category->products as $product)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset(''.$product->product_file)}}" alt="" />
                                    <h2>${{$product->product_price}}</h2>
                                    <p>{{$product->product_name}}</p>
                                    <form action="{{url('admin/product')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="clickCount" value="0">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach

            </div>
            @endforeach


        </div>
    </div><!--/Item according to the Category-->

    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('images/home/recommend1.jpg')}}"  alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                @foreach($getRecommendedProduct as $getProduct)
                <div class="item">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset(''.$getProduct->product_file)}}" class="img-responsive" style="width: 268px;height: 160px;" alt="" />
                                    <h2>${{$getProduct->product_price}}</h2>
                                    <p>{{$getProduct->product_name}}</p>
                                    <form action="{{url('admin/product')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="clickCount" value="0">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div><!--/recommended_items-->
@endsection
