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
                        <i class="fa fa-dashboard"></i> Create Brand
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--displaying error message--}}
                @include('partials.errorMessage')
                @include('partials.errorMessage')
                @if($subCategories->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!: Please Create a Sub Category First</strong>
                    </div>
                @endif
                <form action="{{url('/admin/brand')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="sub_category_id">Sub Category</label>
                        <select class="form-control" name="sub_category_id" id="sub_category_id">
                            @foreach($subCategories as $subCategory)
                                <option value="{{$subCategory->id}}">{{$subCategory->sub_category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brName">Brand Name</label>
                        <input required type="text" name="BrandName" id="brName" class="form-control" placeholder="Brand Name" >
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