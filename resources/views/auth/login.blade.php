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

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">

    @auth
        <link href="{{ asset('assets/themes/cork/css/elements/avatar.css') }}" rel="stylesheet" type="text/css" />
    @endauth
</head>

<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        @if ( ! auth()->check() || session()->has('success'))
                            <h1 class="">Login</h1>
                            <p class="general-message-container">
                                @if (session('status'))
                                    <span class="text-success">{{ session('status') }}</span>
                                @else
                                    Silahkan <i>login</i> untuk mengakses sistem
                                @endif
                            </p>

                            <form class="text-left" action="#" id="login-form" method="POST">
                                <div class="form">

                                    <div id="email-field" class="field-wrapper input">
                                        <label for="email">EMAIL ATAU NPM</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-at-sign">
                                            <circle cx="12" cy="12" r="4"></circle>
                                            <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                        </svg>
                                        <input id="email" name="email" type="text" class="form-control" placeholder="Email"
                                            minlength="8" maxlength="128" required>
                                        <div class="invalid-feedback email-feedback"></div>
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
                                        <div class="invalid-feedback password-feedback"></div>

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
                                        <a href="{{ route('login.facebook') }}" class="btn social-fb">
                                            <i class="fab fa-facebook"></i>
                                            <span class="brand-name">Facebook</span>
                                        </a>
                                        <a href="{{ route('login.google') }}" class="btn social-google">
                                            <i class="fab fa-google"></i>
                                            <span class="brand-name">Google</span>
                                        </a>
                                    </div>

                                    <!-- <p class="signup-link">Not registered ? <a href="auth_register_boxed.html">Create an account</a></p> -->

                                </div>
                            </form>
                        @endif

                        @if (auth()->check() && ! session()->has('success'))
                            <div class="avatar avatar-xl">
                                <img alt="{{ auth()->user()->member->name }}" src="{{ getProfilePicture() }}"
                                    class="rounded-circle" />
                            </div>
                            <h5 class="mt-2">Halo, <i>{{ auth()->user()->member->name }}</i></h5>

                            <div class="row mt-5">
                                <div class="col-xs-12 col-8 mx-auto">
                                    <a href="{{ route('index') }}" class="btn btn-info btn-md">Dasbor</a>
                                    <a href="#" class="btn btn-md btn-danger logout-btn"><span>Keluar</span></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off">
            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
            <line x1="1" y1="1" x2="23" y2="23"></line>
        </svg>
    -->


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/themes/cork/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    @guest
        <script>
            var togglePassword = document.getElementById("toggle-password");
            var formContent = document.getElementsByClassName('form-content')[0];
            var getFormContentHeight = formContent.clientHeight;

            var formImage = document.getElementsByClassName('form-image')[0];
            if (formImage) {
                var setFormImageHeight = formImage.style.height = getFormContentHeight + 'px';
            }
            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                });
            }

            const loginForm = document.querySelector('#login-form');

            const messageContainer = document.querySelector('.general-message-container');
            const emailField = loginForm.querySelector('#email');
            const emailFeedback = loginForm.querySelector('.email-feedback');
            const passwordField = loginForm.querySelector('#password');
            const passwordFeedback = loginForm.querySelector('.password-feedback');
            const loginButton = loginForm.querySelector('.btn-login');

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();

                if (email.value != '' && password.value != '') {
                    loginButton.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Log In ...';

                    emailField.setAttribute('disabled', 'disabled');
                    passwordField.setAttribute('disabled', 'disabled');
                    loginButton.setAttribute('disabled', 'disabled');

                    fetch('{{ route('auth.login') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            },
                            body: JSON.stringify({
                                email: emailField.value,
                                password: passwordField.value
                            })
                        })
                        .then(res => res.json())
                        .then(res => {
                            loginButton.innerHTML = 'Log In';

                            releaseInputField();
                            if (res.error) {
                                if (res.validations) {
                                    if (res.validations.email) {
                                        emailField.classList.add('is-invalid');
                                        emailFeedback.innerHTML = res.validations.email[0];
                                    }

                                    if (res.validations.password) {
                                        passwordField.classList.add('is-invalid');
                                        passwordFeedback.innerHTML = res.validations.password[0];
                                    }
                                } else if (res.message) {
                                    messageContainer.innerHTML = res.message;
                                    messageContainer.classList.add('text-danger');
                                }
                            } else if (res.success) {
                                localStorage.setItem('passportAccessToken', res.token.accessToken);
                                localStorage.setItem('passportAccessTokenType', 'Bearer');
                                localStorage.setItem('passportAccessTokenExpireAt', res.token.expiresAt);

                                releaseInputField();
                                loginButton.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                                loginButton.setAttribute('disabled', 'disabled');

                                messageContainer.classList.add('text-success');

                                messageContainer.innerHTML = 'Berhasil login';
                                setTimeout(function() {
                                    messageContainer.innerHTML = 'Anda akan segera dialihkan';
                                }, 2000);
                                setTimeout(function() {
                                    messageContainer.innerHTML =
                                        '<i class="fa fa-spin fa-spinner"></i> Mengalihkan...';
                                }, 3500);
                                setTimeout(function() {
                                    window.location = '{{ route('index') }}';
                                }, 6000);
                            }
                        })
                        .catch(errors => {
                            loginButton.innerHTML = 'Log In';

                            messageContainer.innerHTML = errors;

                            releaseInputField();
                        });
                }
            });

            function releaseInputField() {
                emailField.removeAttribute('disabled');
                passwordField.removeAttribute('disabled');
                loginButton.removeAttribute('disabled');

                messageContainer.innerHTML = 'Silahkan <i>login</i> untuk mengakses sistem';
                if (messageContainer.classList.contains('text-danger')) {
                    messageContainer.classList.remove('text-danger');
                }
                if (emailField.classList.contains('is-invalid')) {
                    emailField.classList.remove('is-invalid');
                }
                if (passwordField.classList.contains('is-invalid')) {
                    passwordField.classList.remove('is-invalid');
                }

                emailFeedback.innerHTML = '';
                passwordFeedback.innerHTML = '';
            }

        </script>
    @endguest

    @auth
        <script>
            const passportAccessToken = localStorage.getItem('passportAccessToken');

            let logoutButton = document.querySelector('.logout-btn');
            logoutButton.addEventListener('click', function(e) {
                e.preventDefault();

                logoutButton.querySelector('span')
                    .innerHTML = 'Keluar...';
                fetch('{{ route('auth.logout') }}', {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        method: 'POST'
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            setTimeout(function() {
                                logoutButton.querySelector('span')
                                    .innerHTML = 'Berhasil!';
                            }, 2500);

                            localStorage.removeItem('passportAccessToken');
                            localStorage.removeItem('passportAccessTokenType');
                            localStorage.removeItem('passportAccessTokenExpireAt');

                            setTimeout(function() {
                                location.reload();
                            }, 5000);
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            });

        </script>
    @endauth

    @if (session('success'))
        <script>
            let msg = document.querySelector('.general-message-container span');
            localStorage.setItem('passportAccessToken', '{{ session('token')['accessToken'] }}');
            localStorage.setItem('passportAccessTokenType', 'Bearer');
            localStorage.setItem('passportAccessTokenExpireAt', '{{ session('token')['expiresAt'] }}');

            setTimeout(function() {
                msg.innerHTML = 'Anda akan segera dialihkan';
            }, 2000);
            setTimeout(function() {
                msg.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Mengalihkan...';
            }, 4000);
            setTimeout(function() {
                window.location = '{{ route('index') }}';
            }, 7000);

        </script>
    @endif
</body>

</html>
