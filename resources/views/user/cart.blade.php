@extends('user.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Cart </h1>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>                                 
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Product Name </th>
                                        <th class="text-center"> Pcs </th>
                                    </tr>
                                </thead>
                                <tbody>                                 
                                    <?php $no = 0;?>
                                    @foreach($cart as $data)
                                    <?php $no++ ;?>
                                        <tr>
                                            <td width="5%" class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->product->product_name }}</td>
                                            <td class="text-center">{{ $data->pcs }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <form action="{{ route('order') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                <div class="form-group">
                                    <label>Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>
                                <center><button class="btn btn-primary" style="width:30%" type="submit"><i class="far fa-"></i> ORDER </a></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection