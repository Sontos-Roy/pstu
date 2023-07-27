@extends('backend.layouts.app2')

@section('content')
<div class="card">
    <h1 class="title"><span>{{ __('Confirm Password') }}</span></h1>
    <div class="col-sm-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        {{ __('Please confirm your password before continuing.') }}

        <form method="POST" action="{{ route('password.confirm') }}" id="sign_id">
                        @csrf
            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                <div class="form-line">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" value="{{ old('password') }}" required autofocus>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-raised waves-effect g-bg-blush2">
                    {{ __('Confirm Password') }}
                        </button>
            </div>
            @if (Route::has('password.request'))
                <div class="text-center">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </div>
            @endif

        </form>
    </div>
</div>
@endsection
