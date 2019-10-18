@extends('shop.layouts')

@section('content')

    <div class="main-page-banner home-3">

    @include('shop.vertical-menu')

    <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="register.html">account</a></li>
                        <li class="active"><a href="forgot-password.html">Forgot Password</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Register Account Start -->
    <div class="Lost-pass ptb-100 ptb-sm-60">
        <div class="container">
            <div class="register-title">
                <h3 class="mb-10 custom-title">register account</h3>
                <p class="mb-10">If you already have an account with us, please login at the login page.</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="password-forgot clearfix" method="post" action="{{ route('password.email') }}">
                @csrf

                <fieldset>
                    <legend>Your Personal Details</legend>
                    <div class="form-group d-md-flex">
                        <label class="control-label col-md-2" for="email"><span class="require">*</span>Enter you email
                            address here...</label>
                        <div class="col-md-10">
                            <input id="email" type="email" class="form-control @error('email')
                            is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="Enter you email address here..." autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </fieldset>
                <div class="buttons newsletter-input">
                    <div class="float-left float-sm-left">
                        <a class="customer-btn mr-20" href="{{ route('login') }}">Back</a>
                    </div>
                    <div class="float-right float-sm-right">
                        <input type="submit" value="Continue" class="return-customer-btn">
                    </div>
                </div>
            </form>
        </div>
        <!-- Container End -->
    </div>
    <!-- Register Account End -->

@endsection