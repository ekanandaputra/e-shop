@extends('admin.layouts.master')
   
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Notification</h1>
        <div class="section-header-breadcrumb">
        </div>
    </div>

    <div class="col-12">
        @foreach($notif as $data)
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ $data->description }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    </div>

</section>
@endsection