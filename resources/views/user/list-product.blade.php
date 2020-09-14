@extends('user.layouts.master')
   
@section('content')

<section class="section">
    <div class="section-header">
        <h1>List Product</h1>
        <div class="section-header-breadcrumb">
        </div>
    </div>

    <div class="row">
        @foreach($product as $data)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <strong>{{$data -> product_name}}</strong>   
                    </div>
                    <div class="card-body">
                        <center><img src="https://image.freepik.com/free-vector/happy-shop-logo-template_57516-57.jpg" alt="" width="80%"></center>
                    </div>
                    <div class="card-footer">
                        Rp. {{$data -> price}} <br> 
                        <a href="/detail-product/{{ $data->product_id }}" class="btn btn-block btn-primary mt-2">Detail Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection