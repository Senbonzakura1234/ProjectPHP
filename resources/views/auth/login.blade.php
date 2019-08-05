@extends('layouts.app')

@section('content')
        <div class="row">
            <form id="form-controller" class="col-md-6 col-lg-5 col-xl-3 mr-auto ml-auto" method="POST" action="{{ route('login') }}">
                <div class="form-group text-center mb-5">
                    <h2>{{ __('Login') }}</h2>
                </div>
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password"
                           required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control form-check custom-checkbox">
                        <input type="checkbox" name="remember"
                               class="custom-control-input form-check-input"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-dark" style="width: 100%">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn" style="width: 100%" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

				<div class="form-group text-center" >
					<a href="{{ url('auth/google') }}" class="btn btn-primary d-block">
						<span class="fab fa-google"></span> Login with Google account
					</a>
					<small>Don't have an account? <a href="{{ route('register') }}">Register</a></small>
				</div>
            </form>
        </div>

        <script type="text/javascript">
            let newWindowHeight1 = $(window).height(),
                headerHeight1 = $(".navbar-bar").outerHeight(),
                mainHeight = $(".main-dashboard").outerHeight(),
                marginValue = (newWindowHeight1 - headerHeight1 - mainHeight)/2;
            $(document).ready(function () {
                $(".main-dashboard").css("margin-top",marginValue);
            })
        </script>
@endsection
