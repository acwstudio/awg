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
                        <li><a href="#">Register</a></li>
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
                        <h3 class="mb-10">REGISTER ACCOUNT</h3>
                        <p class="mb-10">If you already have an account with us, please login at the login page.</p>
                    </div>
                </div>
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-register" method="POST" action="{{ route('customer.register') }}">
                        @csrf

                        <fieldset>
                            <legend>Your Personal Details</legend>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="firstName"><span class="require">*</span>First
                                    Name</label>
                                <div class="col-md-10">
                                    <input id="firstName" type="text" class="form-control @error('first_name')
                                    is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="lastName"><span class="require">*</span>Last
                                    Name</label>
                                <div class="col-md-10">
                                    <input id="lastName" type="text" class="form-control @error('last_name')
                                    is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="email"><span class="require">*</span>Enter
                                    you email address here...</label>
                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="number">
                                    <span class="require">*</span>Telephone</label>
                                <div class="col-md-10">
                                    <input id="number" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" required>

                                    @error('phone')
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
                                <label class="control-label col-md-2" for="password-confirm"><span class="require">*</span>Confirm
                                    Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend>Privacy Policy</legend>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label" for="agree">
                                    <span class="require">*</span><span>I have read and agree to the
                                        <a href="#" class="agree"><b>Privacy Policy</b></a></span></label>

                            <input type="checkbox" name="agree" value="1" class="form-control @error('agree')
                                    is-invalid @enderror">

                            {{--<input type="submit" value="Continue" class="return-customer-btn">--}}
                            @error('agree')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                            <input type="submit" value="Continue" class="return-customer-btn">
                        </fieldset>

                        <div class="terms">
                            <div class="float-md-right">
                                {{--<span>I have read and agree to the <a href="#"--}}
                                                                      {{--class="agree"><b>Privacy Policy</b></a></span>--}}

                                {{--<input type="checkbox" name="agree" value="1" class="form-control @error('agree')--}}
                                    {{--is-invalid @enderror">--}}

                                {{--<input type="submit" value="Continue" class="return-customer-btn">--}}
                                {{--@error('agree')--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
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
@endsection