<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <link rel="stylesheet" href="/css/app.css">
    <link href="/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="/images/icon/logo.png" alt="CoolAdmin">
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control au-input au-input--full @error('username') is-invalid @enderror" type="text" name="username"
                                           placeholder="Username"  id="username" value="{{ old('username') }}">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email </label>
                                <div class="col-sm-10">
                                    <input class="form-control au-input au-input--full @error('email') is-invalid @enderror" type="email" name="email"
                                           placeholder="Email"  id="email" value="{{ old('email') }}">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control au-input au-input--full @error('password') is-invalid @enderror" type="password" name="password"
                                           placeholder="Password"  id="password" value="{{ old('password') }}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control au-input au-input--full" type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="{{ route('admin.login') }}">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



</body>

</html>
<!-- end document-->
