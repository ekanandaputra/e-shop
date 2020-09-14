@extends('auth.layout')
   
@section('content')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="login-brand">
        <img src="{{ asset('img/logo-login.png') }}" alt="logo" width="300" >
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h5>Form Register</h5>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}" >
                @csrf
                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Nama</label>
                        <div class="float-right">
                        </div>
                    </div>
                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="2" required >
                    <div class="invalid-feedback">
                        Please fill in your email
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="3" required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Konfirmasi Password</label>
                        <div class="float-right">
                        </div>
                    </div>
                    <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" tabindex="4" required>
                    <div class="invalid-feedback">
                        please fill in your password Confirmation
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="5">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection