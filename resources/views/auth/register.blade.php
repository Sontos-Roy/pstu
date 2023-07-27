@extends('backend.layouts.app2')

@section('content')

<div class="card">
    <h1 class="title"><span>{{ __('Register') }}</span></h1>
    <div class="col-sm-12">
        <form method="POST" action="{{ route('register') }}" id="sign_id">
            @csrf
            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                <div class="form-line">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="{{ __('Your Name') }}" value="{{ old('name') }}" required autofocus>
                </div>

            </div>
            @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                <div class="form-line">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autofocus>
                </div>

            </div>
            @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                <div class="form-line">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        placeholder="{{ __('Password') }}" required>
                </div>

            </div>
            @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                <div class="form-line">
                    <input type="password" class="form-control" name="password_confirmation"
                        placeholder="Confirm Password" required autocomplete="new-password">
                </div>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-raised waves-effect g-bg-blush2">
                    {{ __('Register') }}
                </button>
                {{-- <a href="sign-up.html" class="btn btn-raised waves-effect" >SIGN UP</a> --}}
            </div>

        </form>
    </div>
</div>
@endsection
