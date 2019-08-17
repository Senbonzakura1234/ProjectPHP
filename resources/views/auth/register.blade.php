@extends('layouts.app2')

@section('content')
        <div class="row">
            <form id="form-controller" class="col-md-8 col-lg-7 col-xl-6 mr-auto ml-auto" method="POST" action="{{ route('register') }}">
                <div class="form-group text-center mb-5">
                    <h2>{{ __('Register') }}</h2>
                </div>
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-dark" style="width: 100%">
                        {{ __('Register') }}
                    </button>
                </div>

				<div class="form-group text-center" >
					<a href="{{ url('auth/google') }}" class="btn btn-primary d-block">
						<span class="fab fa-google"></span> Login with Google account
					</a>
					<small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
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
