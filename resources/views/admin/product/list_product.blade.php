@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>List Product </h1>
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

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 style="color:white">List Product</h4> 
                        <a href="/admin/add/product" class="btn btn-primary">Add Product</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>                                 
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Product Name </th>
                                        <th class="text-center"> Description </th>
                                        <th class="text-center"> Price </th>
                                        <th class="text-center"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>                                 
                                    <?php $no = 0;?>
                                    @foreach($product as $data)
                                    <?php $no++ ;?>
                                        <tr>
                                            <td width="5%">{{ $no }}</td>
                                            <td>{{ $data->product_name }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>{{ $data->price }}</td>
                                            <td width="15%"><center><a href="/admin/edit/product/{{ $data->product_id }}" class="btn btn-primary">Edit</a> <a href="/admin/delete/product/{{ $data->product_id }}" class="btn btn-danger">Delete</a></center></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection