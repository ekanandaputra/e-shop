@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>List Order </h1>
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
                        <h4 style="color:white">List Order</h4> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>                                 
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Date </th>
                                        <th class="text-center"> Address </th>
                                        <th class="text-center"> Total Price </th>
                                        <th class="text-center"> Status </th>
                                        <th class="text-center"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>                                 
                                    <?php $no = 0;?>
                                    @foreach($order as $data)
                                    <?php $no++ ;?>
                                        <tr>
                                            <td width="5%">{{ $no }}</td>
                                            <td>{{ $data->order_date }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>{{ $data->total_price }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td width="15%"><center><a href="/admin/show/order/{{ $data->order_id }}" class="btn btn-primary">Show</a> </center></td>
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