@extends('shop.layouts')

@section('content')
    <!-- Main Header Area Start Here -->
    <header>
        <!-- Header Middle Start Here -->
        <div class="header-middle ptb-15 black-bg2 home-4">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-3 col-md-12">
                        <div class="logo mb-all-30">
                            <a href="{{ route('shop') }}"><img src="{{ asset('shop/img/logo/logo2.png') }}"
                                                               alt="logo-image"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Header Middle End Here -->
    </header>

    <div class="main-page-banner home-3">

    <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{ route('shop') }}">Home</a></li>
                        <li class="active"><a href="#">Sign in</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
    </div>

    <!-- LogIn Page Start -->
    <div class="log-in ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <!-- New Customer Start -->
                <div class="col-md-6">
                    <div class="well mb-sm-30">
                        <div class="new-customer">
                            <h3 class="custom-title">new customer</h3>
                            <p class="mtb-10"><strong>Register</strong></p>
                            <p>By creating an account you will be able to shop faster, be up to date on an order's
                                status, and keep track of the orders you have previously made</p>
                            <a class="customer-btn" href="{{ route('customer.register') }}">continue</a>
                        </div>
                    </div>
                </div>
                <!-- New Customer End -->
                <!-- Returning Customer Start -->
                <div class="col-md-6">
                    <div class="well">
                        <div class="return-customer">
                            <h3 class="mb-10 custom-title">returnng customer</h3>
                            <p class="mb-10"><strong>I am a returning customer</strong></p>
                            <form method="POST" action="{{ route('customer.login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus
                                           placeholder="Enter your email address...">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>

                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                @if (Route::has('customer.password.request'))
                                    <p class="lost-password"><a href="{{ route('customer.password.request') }}">Forgot
                                            password?</a></p>
                                @endif
                                <input type="submit" value="Login" class="return-customer-btn">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Returning Customer End -->
            </div>
        </div>
    </div>
    <!-- LogIn Page End -->
    @include('shop.footer')
@endsection