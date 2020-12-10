<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lupa Password?</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/favicon.ico') }}" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/switches.css') }}">
</head>
<body class="form no-image-content">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link recovery">
                            @if (session('status'))
                                <span class="text-success">{{ session('status') }}</span>
                            @else
                                Masukkan email untuk mendapatkan <i>password</i> baru
                            @endif
                        </p>
                        <form class="text-left" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">EMAIL</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="" placeholder="Email" minlength="10" maxlength="128" required>
                                    
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Reset</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
   <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
   <script src="{{ asset('assets/themes/cork/js/libs/jquery-3.1.1.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
   <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script src="{{ asset('assets/themes/cork/js/authentication/form-2.js') }}"></script>

</body>
</html>