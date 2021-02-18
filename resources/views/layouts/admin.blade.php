<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @if (getSiteLogo() == NULL)
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/favicon.ico') }}"/>
    @else
        <link rel="icon" href="{{ getSiteLogo() }}"/>
    @endif
    <link href="{{ asset('assets/themes/cork/css/loader.css') }}" rel="stylesheet" type="text/css" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @yield('custom_head')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <x-admin.navbar />
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <x-admin.sidebar />
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            @yield('content')

            <x-admin.footer />
        </div>
        <!--  END CONTENT AREA  -->


    </div>
    <!-- END MAIN CONTAINER -->

    @yield('custom_html')

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/themes/cork/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/themes/cork/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();

            $(document).on('click', '.user-profile-dropdown .dropdown-menu .dropdown-item a.logout-btn', function (e) {
                e.stopPropagation();
            });
        });
    </script>
    <script src="{{ asset('assets/themes/cork/js/custom.js') }}"></script>
    <script src="{{ asset('assets/themes/cork/js/loader.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
        const passportAccessToken = localStorage.getItem('passportAccessToken');
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let logoutButton =  document.querySelector('.logout-btn');
        logoutButton.addEventListener('click', function (e) {
            e.preventDefault();

            logoutButton.querySelector('span')
                .innerHTML = 'Log Out...';
            fetch('{{ route('auth.logout') }}', {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                method: 'POST'
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    logoutButton.querySelector('span')
                        .innerHTML = 'Berhasil!';

                    localStorage.removeItem('passportAccessToken');
                    localStorage.removeItem('passportAccessTokenType');
                    localStorage.removeItem('passportAccessTokenExpireAt');

                    setTimeout(function () {
                        window.location = '{{ route('login') }}';
                    }, 2000);
                }
            })
            .catch(errors => {
                console.log(errors);
            });
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @stack('custom_js')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>