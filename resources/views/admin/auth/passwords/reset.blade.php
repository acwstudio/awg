<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <div class="text-center mb-4">
                <h4>New Password</h4>
                <p>Enter your new password.</p>
            </div>
            <form  method="POST" action="{{ route('admin.password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <div class="form-label-group">

                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" placeholder="email" value="{{ $email ?? old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback"
                                  role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif

                        <label for="email">{{ __('E-Mail Address') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">

                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                        <label for="password">{{ __('Password') }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm password" required>

                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Password</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('admin.register') }}">Register an Account</a>
                <a class="d-block small" href="{{ route('admin.login') }}">Login Page</a>
                <a class="d-block small" href="{{ route('shop') }}">Back to site</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

</body>

</html>
