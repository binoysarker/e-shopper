@extends('layouts.adminMaster')
@section('title')
    Admin DashBoard
@endsection
@section('adminContent')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Statistics Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            @if(session()->has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissable">
                        {{session()->get('message')}}
                    </div>
                </div>
            @endif
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">26</div>
                                <div>New Comments!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">12</div>
                                <div>New Tasks!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">124</div>
                                <div>New Orders!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>Support Tickets!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Categories</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($categories as $category)
                            <li href="#" class="list-group-item">
                                <span>{{$category->categoryName}}</span>
                                <span class="pull-right">
                                        <a href="{{url('/admin/category/'.$category->id.'/edit')}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{ url('/admin/category/'.$category->id) }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('deleteCategory').submit();"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <form id="deleteCategory" action="{{ url('/admin/category/'.$category->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                            </form>
                                    </span>
                            </li>
                        @endforeach
                    </div>
                    {{--<div class="text-right">
                        <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                    </div>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Sub Categories</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($subCategories as $subCategory)
                            <li href="#" class="list-group-item">
                                <span>{{$subCategory->SubCategoryName}}</span>
                                <span class="pull-right">
                                        <a href="{{url('admin/subCategory/'.$subCategory->id.'/edit')}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{ url('admin/subCategory/'.$subCategory->id) }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('deleteSubCategory').submit();"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <form id="deleteSubCategory" action="{{ url('admin/subCategory/'.$subCategory->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                            </form>
                                    </span>
                            </li>
                        @endforeach
                    </div>
                    {{--<div class="text-right">
                        <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                    </div>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Brands</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($brands as $brand)
                            <li href="#" class="list-group-item">
                                <span>{{$brand->BrandName}}</span>
                                <span class="pull-right">
                                        <a href="{{url('admin/brand/'.$brand->id.'/edit')}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{ url('admin/brand/'.$brand->id) }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('deleteBrand').submit();"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <form id="deleteBrand" action="{{ url('admin/brand/'.$brand->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                            </form>
                                    </span>
                            </li>
                        @endforeach
                    </div>
                    {{--<div class="text-right">
                        <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                    </div>--}}
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Product list</h3>
                </div>
                <div class="panel-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>SubCategory Name</th>
                                <th>Product Brief</th>
                                <th>Product Description</th>
                                <th>Product Price</th>
                                <th>File Location</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->productName}}</td>
                                    <td>{{$product->category->categoryName}}</td>
                                    <td>{{$product->subCategory->SubCategoryName}}</td>
                                    <td>{{substr($product->productBrief,0,50)}}</td>
                                    <td>{{substr($product->productDescription,0,50)}}</td>
                                    <td>{{$product->productPrice}}</td>
                                    <td>{{$product->product_file}}</td>
                                    <td>
                                        <a href="{{url('/admin/product/'.$product->id.'/edit')}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{url('/admin/product/'.$product->id)}}" onclick="event.preventDefault();document.getElementById('deleteProduct').submit()">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                        <form id="deleteProduct" action="{{url('/admin/product/'.$product->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--<div class="text-right">
                        <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                    </div>--}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                    </div>
                    <div class="panel-body">
                        <div id="morris-area-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
                    </div>
                    <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                        <div class="text-right">
                            <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- /.row -->

    </div>
@endsection