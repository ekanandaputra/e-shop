@extends('admin.layouts.master')
   
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Product</h1>
        <div class="section-header-breadcrumb">
        </div>
    </div>

    <div class="col-12">
        @if (session('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('success') }}
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
                    <h4 style="color:white"> Edit Product </h4>
                </div>
                <form action="{{ route('admin.edit.product.submit', $product->product_id) }}" method="POST">
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
                            <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
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
                            <input type="text" class="form-control" name="description" value="{{ $product->description }}">
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
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
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