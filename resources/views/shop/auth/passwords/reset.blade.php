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
                            <a href="{{ route('shop.home') }}"><img src="{{ asset('shop/img/logo/logo2.png') }}"
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
                        <li><a href="{{ route('shop.home') }}">Home</a></li>
                        <li class="active"><a href="#">New password</a></li>
                        {{--<li class="active"><a href="contact.html">contact us</a></li>--}}
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
    </div>
    <!-- Register Account Start -->
    <div class="register-account ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="register-title">
                        <h3 class="mb-10">NEW PASSWORD</h3>
                    </div>
                </div>
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-register" method="POST" action="{{ route('customer.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <fieldset>
                            <legend>Your Personal Details</legend>

                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="email"><span class="require">*</span>Enter
                                    you email address here...</label>
                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ $email ?? old('email') }}" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <legend>Your Password</legend>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="password">
                                    <span class="require">*</span>Password:</label>
                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control @error('password')
                                    is-invalid @enderror" name="password" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="password-confirm">
                                    <span class="require">*</span>Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>

                            </div>
                        </fieldset>

                        <div class="terms">
                            <div class="float-md-right">
                                <input type="submit" value="Continue" class="return-customer-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Register Account End -->

    @include('shop.footer')
@endsection