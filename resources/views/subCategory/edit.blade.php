@extends('layouts.adminMaster')
@section('title')
    Admin | Edit
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
                        <i class="fa fa-dashboard"></i> Edit Sub Category
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--displaying error message--}}
                @include('partitlas.errorMessage')

                <form action="{{url('admin/subCategory/'.$subCategory->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input type="hidden" name="category_id" value="{{$subCategory->category_id}}">
                        <div class="form-group">
                            <label for="catName">category Name</label>
                            <input required type="text" name="SubCategoryName" id="catName" class="form-control" value="{{$subCategory->SubCategoryName}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
@endsection