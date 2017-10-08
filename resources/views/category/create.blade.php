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
                        <i class="fa fa-dashboard"></i> Create Category
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--displaying error message--}}
                @include('partials.errorMessage')
                <form action="{{url('/admin/category')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="form-group">
                        <label for="catName">Category Name</label>
                        <input required type="text" name="categoryName" id="catName" class="form-control" placeholder="Category Name" >
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