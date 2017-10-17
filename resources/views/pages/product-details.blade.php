@extends('layouts.master')
@section('title')
	Product Details
@endsection
@section('content')
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img id="zoom_01" data-zoom-image="{{asset(''.$product['product_file'])}}" src="{{asset(''.$product['product_file'])}}" alt="" />
				<h3>ZOOM</h3>
			</div>
            {{--Related Products--}}

			<div id="similar-product" class="carousel slide" data-ride="carousel">
                <h3 class="text-warning">RELATED PRODUCTS</h3>


				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
					</div>
                    @php($getSubCategories = \App\SubCategory::where('id',$product['sub_category_id'])->get())
                    @foreach($getSubCategories as $getSubCategory)
                        @foreach($getSubCategory->products as $relatedProducts)
                            <div class="item">
                                <a href=""><img src="{{asset(''.$relatedProducts->product_file)}}" class="img-responsive" style="width: 84px;height: 80px" alt=""></a>
                            </div>
                        @endforeach
                    @endforeach


				</div>

				<!-- Controls -->
				<a class="left item-control" href="#similar-product" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="right item-control" href="#similar-product" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>

		</div>
		<div class="col-sm-7">
			<div class="product-information"><!--/product-information-->
				@if($product['Condition'] == "New")
					<img  src="{{asset('images/product-details/new.jpg')}}" class="newarrival" alt="" />
				@endif
				<h2>{{$product['product_name']}}</h2>
				<p>Web ID: {{$product['id']}}</p>
				<img src="{{asset('images/product-details/rating.png')}}" alt="" />
                <h3 class="text-warning">US {{$product['product_price']}}</h3>

				<form action="{{url('/cart')}}" id="MyForm" method="POST" >
					{{csrf_field()}}
					<input type="hidden" name="id" value="{{$product->id}}">
					<input type="hidden" name="name" value="{{$product->product_name}}">
					<input type="hidden" name="price" value="{{$product->product_price}}">
					<input type="number" name="qty" value="1">
					<input type="hidden" name="image" value="{{$product->product_file}}">
					<button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i>Add to cart</button>
				</form>
				<p><b>Availability:</b> {{$product['availability'] == 1? "Available":"Not Available"}}</p>
				<p><b>Condition:</b> {{$product['condition']}}</p>
				<p><b>Brand:</b> {{$product['brand_name']}}</p>
				<a href=""><img src="{{asset('images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->

	<div class="category-tab" id="CategorySection"><!--category-tab-->
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
										<h2>{{$product->product_price}}</h2>
										<p>{{$product->product_name}}</p>
										<a href="{{url('/product_details/'.$product->id)}}" type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product
											Details</a>
									</div>

								</div>
							</div>
						</div>
					@endforeach

				</div>
			@endforeach


		</div>
	</div><!--/category-tab-->

	<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">recommended items</h2>

		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{asset('images/home/recommend1.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default "><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
										<h2>{{$getProduct->product_price}}</h2>
										<p>{{$getProduct->product_name}}</p>
										<a href="{{url('/product_details/'.$product->id)}}" type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product
											Details</a>
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
@push('scripts')
    <script src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
@endpush