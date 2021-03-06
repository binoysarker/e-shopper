<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                @foreach($categories as $category)
                <div class="panel-heading">
                    <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#{{str_replace(" ","-",$category->category_name)}}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                {{$category->category_name}}
                            </a>
                    </h4>
                </div>
                <div id="{{str_replace(" ","-",$category->category_name)}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul id="SubCategorySection">
                            @foreach($category->subCategories as $subCategory)
                            <li><a href="/?SubCategoryName={{$subCategory->sub_category_name}}">{{$subCategory->sub_category_name}}
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>

        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked" id="BrandSection">

                    @foreach($brands as $brand)
                        @php($ProductByBrand = \App\Product::where('brand_name',$brand->brand_name)->pluck('brand_name'))
                        <li><a href="/?BrandName={{$brand->brand_name}}"> <span class="badge  pull-right">({{count($ProductByBrand)}})</span>{{$brand->brand_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div><!--/brands_products-->

        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="{{asset('images/home/shipping.jpg')}}" alt="" />
        </div><!--/shipping-->

    </div>
</div>