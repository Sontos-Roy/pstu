@extends('backend.layouts.app2')

@section('content')
    <div class="card">
        <h1 class="title"><span>{{ __('Login') }}</span></h1>
        <div class="col-sm-12">
            <form method="POST" action="{{ route('login') }}" id="sign_id">
                @csrf
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
                <div class="">

                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-raised waves-effect g-bg-blush2">
                        {{ __('Login') }}
                    </button>
                    {{-- <a href="sign-up.html" class="btn btn-raised waves-effect" >SIGN UP</a> --}}
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
