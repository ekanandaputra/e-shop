@extends('admin.layouts.master')
   
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Add Product</h1>
        <div class="section-header-breadcrumb">
        </div>
    </div>

    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 style="color:white"> Add Product </h4>
                </div>
                <form action="{{ route('admin.add.product.submit') }}" method="POST">
                @csrf
  
                <div class="card-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="product_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <button class="btn btn-icon icon-left btn-primary float-left mb-3" type="submit"><i class="far fa-edit"></i> Submit</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection