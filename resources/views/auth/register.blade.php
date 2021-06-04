@extends('layouts.app')
@section('title','Register')

@section('content')
<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form  class="card auth_form" method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div class="header">
                        <a href="/"><img class="logo" src="adptc/assets/img/logo-pro-ads.png" alt=""></a>
                        <h5>Sign Up</h5>
                        <span>Register a new membership</span>
                    </div>
                    <div class="body">

                        @if(Cookie::get('code'))
                            <div class="input-group mb-3">
                                <input id="referred" type="text" class="form-control  @error('referred') is-invalid @enderror" name="referred" value="{{ Cookie::get('code') }}" required autocomplete="referred" disabled autofocus placeholder="Refered By...">

                                @error('referred')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                        @endif
                        <div class="input-group mb-3">
                            <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input id="usertype" type="text" class="form-control " name="usertype" autofocus placeholder="Admin">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input id="email" type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                        </div>

                        <div class="checkbox">
                            <input id="remember_me" type="checkbox">
                            <label for="remember_me">I read and agree to the <a href="javascript:void(0);">terms of usage</a></label>
                        </div>

                        <div class="signin_with mt-3">
                            <a class="link" href="/login">You already have an account? <span class="tooltip">login</span></a>
                        </div>
                        {{--@if($settings->recaptcha == 1)
                            <div class="input-group col-md-3 col-md-offset-2">

                                {!! Recaptcha::render() !!}

                            </div>
                        @endif--}}
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                            {{ __('Register') }}
                        </button>
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
                    <img src="assets/images/signup.svg" alt="Sign Up" />
                </div>
            </div>
        </div>
    </div>
</div>

{{--<section class="bg-home" style="background-image: url('alita/images/home/bg-login.jpg');">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-white p-30 rounded box-shadow">
                            <div class="text-center">
                                <h4><a href="index-2.html"><img src=alita/images/logo1.png height="20" alt="logo"></a></h4>
                                <div class="spacer-15"></div>
                            </div>
                            <form method="POST" action="{{ route('register') }}" class="login-form">
                                @csrf

                                <div class="row">

                                    @if(Cookie::get('code'))

                                        <div class="col-lg-12 mt-2">
                                            <label class="">Refered By</label>
                                            <input id="referred" type="text" class="form-control" name="referred" value="{{ Cookie::get('code') }}" placeholder="Your Sponsor"  required="">
                                        </div>
                                    @endif
                                    <div class="col-lg-12 mt-2">
                                        <label class="">First name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="First Name"  required="">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                            <label class="">Email</label>
                                        <input id="email"  type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Email"  required="">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                            <label class="">Password</label>
                                        <input id="passord"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required="">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                            <label class="">Confirm Password</label>
                                        <input id="passowrd-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="">
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheck1">I Accept <a href="#">Terms And Condition</a></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4 mb-3">
                                        <button type="submit" class="btn btn-custom w-100">Register</button>
                                    </div>
                                    <div class="mx-auto">
                                        <p class="mb-0 mt-2"><small class="text-dark mr-2">Already have an account ?</small> <a href="/login" class="text-dark font-weight-bold">Sign in</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}

{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="header">
                    <img class="logo" src="assets/images/logo.svg" alt="">
                    <h5>Sign Up</h5>
                    <span>Register a new membership</span>
                </div>
                <div class="card-body">
                    <form class="card auth_form" method="POST" action="{{ route('register') }}" >
                        @csrf

                        <div class="input-group mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Designed by <a href="https://thememakker.com/" target="_blank">ThemeMakker</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="assets/images/signup.svg" alt="Sign Up" />
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
