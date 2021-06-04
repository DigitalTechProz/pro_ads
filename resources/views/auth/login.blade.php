@extends('layouts.app')

@section('content')
  <!-- Log in Form-->
  {{--<section class="bg-home" style="background-image: url('alita/images/home/bg-login.jpg');">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-white p-30 rounded box-shadow">
                            <div class="text-center">
                                <h4><a href="/"><img src="alita/images/logo1.png" height="20" alt="logo"></a></h4>
                                <div class="spacer-15"></div>
                            </div>
                            <form action="{{ route('login') }}" method="POST" class="login-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 mt-2">
                                        <label class="f-12">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror


                                    </div>

                                    <div class="col-lg-12 mt-2">
                                        <label class="">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 mt-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-4">
                                        <button class="btn btn-custom w-100" type="submit">Sign in</button>
                                    </div>
                                    <div class="mx-auto">
                                        @if (Route::has('password.request'))
                                            <p class="mb-3 mt-2"><a href="{{ route('password.request') }}" class="text-dark font-weight-bold">Forgot your password ?</a></p>
                                        @endif
                                    </div>
                                    <div class="mx-auto">
                                        <p class="mb-0 mt-2"><small class="text-dark mr-2">Don't have an account ?</small> <a href="/register" class="text-dark font-weight-bold">Sign Up</a></p>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<div class="container-fluid">
    <div class="copyright text-center">
        &copy;
        <script>document.write(new Date().getFullYear())</script>,
        <span>Developed by <a href="#" target="_blank">Digital Tech Proz</a></span>
    </div>
</div>--}}


<!-- Log in Form END-->
<div class="authentication">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="header">
                        <img class="logo" src="adptc/assets/img/logo-pro-ads.png" alt="">
                        <h5>Access Your Account</h5>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group-append">
                                @if (Route::has('password.request'))
                                <span class="input-group-text"><a href="{{ route('password.request') }}" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                                @endif
                            </div>
                        </div>
                        <div class="checkbox">

                            <input  type="checkbox" name="remember" id="remember_me"{{ old('remember') ? 'checked' : '' }}>
                            <label for="remember_me">Remember Me</label>
                        </div>
                        <div class="signin_with mt-3">
                            <a class="link" href="/register">You don't have an account yet? <span class="tooltip">register</span></a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <div class="signin_with mt-3">
                            <p class="mb-0">or Sign Up using</p>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button>
                        </div>
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Developed by <a href="#" target="_blank">Digital Tech Proz</a></span>
                </div>
            </div>

            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="assets/images/signin.svg" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>
 {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
