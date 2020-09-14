@extends('admin.layouts.master')
   
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Order Detail</h1>
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
                    <h4 style="color:white"> Order Detail </h4>
                </div>
                <form action="{{ route('admin.order.changestatus', $order->order_id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Order ID</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="" value="{{ $order->order_id }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="" value="{{ $order->order_date }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="" value="{{ $order->address }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Total Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="" value="{{ $order->total_price }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="" value="{{ $order->status }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Proof of payment</label><br>
                        <img src="{{ asset('payment/'.$order->payment) }}" alt="" width="400px">
                    </div>
                    <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                                <th class="text-center"> No </th>
                                <th class="text-center"> Product Name </th>
                                <th class="text-center"> Description </th>
                                <th class="text-center"> Price </th>
                            </tr>
                        </thead>
                        <tbody>                                 
                            <?php $no = 0;?>
                            @foreach($detail_order as $data)
                            <?php $no++ ;?>
                                <tr>
                                    <td width="5%">{{ $no }}</td>
                                    <td>{{ $data->product->product_name }}</td>
                                    <td>{{ $data->product->description }}</td>
                                    <td>{{ $data->product->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-icon icon-left btn-primary float-left mb-3 ml-3" type="submit"><i class="far fa-edit"></i> Change Status</a>
            </div>
                </form>
        </div>
    </div>
</div>
</section>
@endsection