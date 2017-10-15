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
                        <i class="fa fa-dashboard"></i> Create Sub Category
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--display error message--}}
                @include('partials.errorMessage')
                @if($categories->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!: Please Create a Category First</strong>
                    </div>
                @endif
                    <form action="{{url('/admin/subCategory')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="SubCategoryName">Sub Category Name</label>
                        <input required type="text" name="SubCategoryName" id="SubCategoryName" class="form-control" placeholder="Sub Category Name" >
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