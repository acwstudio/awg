<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               name="name" value="{{ old('name') }}" placeholder="Your Name" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback"
                                  role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif

                        <label for="name">{{ __('Your Name') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">

                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" placeholder="email" value="{{ old('email') }}" required>

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


                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Register') }}
                </button>
        </form>
        <div class="text-center">
            <a class="d-block small mt-3" href="{{ route('admin.login') }}">Login Page</a>
            <a class="d-block small" href="{{ route('admin.password.request') }}">Forgot Password?</a>
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
