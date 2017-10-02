@extends('layouts.adminMaster')
@section('title')
    Admin | Create
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
                        <i class="fa fa-dashboard"></i> Create Product
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--displaying error message--}}
                @include('partitlas.errorMessage')
                @if($categories->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!: Please Create a Category First</strong>
                    </div>
                @endif
                @if($subCategories->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!: Please Create a Sub Category First</strong>
                    </div>
                @endif
                @if($brands->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!: Please Create a Brand First</strong>
                    </div>
                @endif

                <form action="{{url('/admin/product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_category_id">Sub Category</label>
                        <select class="form-control" name="sub_category_id" id="sub_category_id">
                            @foreach($subCategories as $subCategory)
                                <option value="{{$subCategory->id}}">{{$subCategory->SubCategoryName}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" name="productName" id="productName" class="form-control" placeholder="Product Name" >
                    </div>
                    <div class="form-group">
                        <label for="productBrief">Product Brief</label>
                        <input type="text" name="productBrief" id="productBrief" class="form-control" placeholder="Product Brief" >
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Product Description</label>
                        <textarea name="productDescription" id="productDescription" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">product Price</label>
                        <input type="text" name="productPrice" id="productPrice" class="form-control" placeholder="product Price" >
                    </div>
                    <div class="form-group">
                        <label for="Availability">Availability</label>
                        <select class="form-control" name="Availability" id="Availability">
                            <option value="0">In Stock</option>
                            <option value="1">Out of Stock</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Quantity">Quantity</label>
                        <input type="number" name="Quantity" id="Quantity" class="form-control" placeholder="" aria-describedby="helpId1">
                        <small id="helpId1" class="text-muted">Quentity should be number</small>
                    </div>
                    <div class="form-group">
                        <label for="Condition">Condition</label>
                        <select class="form-control" name="Condition" id="Condition">
                            <option value="New">New</option>
                            <option value="Old">Old</option>
                            <option value="UpComing">UpComing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="BrandName">Brand Name</label>
                        <select class="form-control" name="BrandName" id="BrandName">
                            @foreach($brands as $brand)
                                <option value="{{$brand->BrandName}}">{{$brand->BrandName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_file">Image</label>
                        <input type="file" class="form-control-file" name="product_file" id="product_file"  aria-describedby="fileHelpId">
                        <small id="fileHelpId" class="form-text text-muted">file size must me less then 50kb</small>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
@endsection