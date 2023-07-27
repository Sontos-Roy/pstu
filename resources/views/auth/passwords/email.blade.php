@extends('backend.layouts.app2')

@section('content')
<div class="card">
    <h1 class="title"><span>{{ __('Reset Password') }}</span></h1>
    <div class="col-sm-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}" id="sign_id">
                        @csrf
            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                <div class="form-line">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autofocus>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-raised waves-effect g-bg-blush2">
                    {{ __('Send Password Reset Link') }}
                        </button>
            </div>

        </form>
    </div>
</div>
@endsection
