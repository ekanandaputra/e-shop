@extends('auth.layout')
   
@section('content')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="login-brand">
        <img src="{{ asset('img/logo-login.png') }}" alt="logo" width="300" >
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h5>Reset Password</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.email') }}" >
                @csrf
                <input type="hidden" name="token" value="{{ $token ?? '' }}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection