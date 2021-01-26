<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/favicon.ico') }}" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
</head>

<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Login</h1>
                        <p class="general-message-container">
                            @if (session('status'))
                                <span class="text-success">{{ session('status') }}</span>
                            @else
                                Silahkan <i>login</i> untuk mengakses sistem
                            @endif
                        </p>

                        <form class="text-left" action="{{ route('login-post') }}" id="login-form" method="POST">
                            @csrf

                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <label for="email">EMAIL</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email"
                                        minlength="10" maxlength="128" required>
                                    @error('email')
                                        <div class="invalid-feedback email-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="{{ route('password.forgot') }}" class="forgot-pass-link">Lupa
                                            Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password" minlength="6" maxlength="128" required>
                                    @error('password')
                                        <div class="invalid-feedback password-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary btn-login">Log In</button>
                                    </div>
                                </div>

                                <div class="division">
                                    <span>Atau login dengan</span>
                                </div>

                                <div class="social">
                                    <a href="javascript:void(0);" class="btn social-fb">
                                        <i class="fab fa-facebook"></i>
                                        <span class="brand-name">Facebook</span>
                                    </a>
                                    <a href="javascript:void(0);" class="btn social-google">
                                        <i class="fab fa-google"></i>
                                        <span class="brand-name">Google</span>
                                    </a>
                                </div>

                                <!-- <p class="signup-link">Not registered ? <a href="auth_register_boxed.html">Create an account</a></p> -->

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <script>
        localStorage.setItem('passportAccessToken', '{{ session('token')['accessToken'] }}');
        localStorage.setItem('passportAccessTokenType', 'Bearer');
        localStorage.setItem('passportAccessTokenExpireAt', '{{ session('token')['expiresAt'] }}');

        window.location = '{{ route('index') }}';
    </script>
    @endif
</body>

</html>
