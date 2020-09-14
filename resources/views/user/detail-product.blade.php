@extends('user.layouts.master')
   
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Detail Product</h1>
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
        <div class="col-12">
            <div class="card">
                <form action="{{ route('save.product') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="product_id" value="{{$product->product_id}}">
                <div class="card-header">
                    <strong>{{$product -> product_name}}</strong>   
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <center><img src="https://image.freepik.com/free-vector/happy-shop-logo-template_57516-57.jpg" alt="" width="80%"></center>
                        </div>
                        <div class="col-6">
                            <table>
                            <tr style="height: 50px;">
                                <td style="width: 150px;">Product Name</td>
                                <td style="width: 50px;">:</td>
                                <td>{{$product -> product_name}} </td>
                            </tr>
                            <tr style="height: 50px;">
                                <td style="width: 150px;">Description</td>
                                <td style="width: 50px;">:</td>
                                <td>{{$product -> description}} </td>
                            </tr>
                            <tr style="height: 50px;">
                                <td style="width: 150px;">Price</td>
                                <td style="width: 50px;">:</td>
                                <td>{{$product -> price}} </td>
                            </tr>
                            <tr style="height: 50px;">
                                <td style="width: 150px;">Total</td>
                                <td style="width: 50px;">:</td>
                                <td><input type="text" name="pcs"> </td>
                            </tr>
                            </table>
                        </div>
                    </div>  
                </div>
                <div class="card-footer"> 
                    <button class="btn btn-block btn-icon icon-left btn-primary float-left mb-3" type="submit"><i class="far fa-cart"></i> Add to Cart</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection