<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Meta verifikasi webmaster -->
    @if (getSetting('googleVerifyCode'))
        <meta name="google-site-verification" content="{{ getSetting('googleVerifyCode') }}" />
    @endif
    @if (getSetting('alexaVerifyCode'))
        <meta name="alexaVerifyID" content="{{ getSetting('alexaVerifyCode') }}" />
    @endif
    @if (getSetting('bingVerifyCode'))
        <meta name="msvalidate.01" content="{{ getSetting('bingVerifyCode') }}" />
    @endif
    @if (getSetting('yandexVerifyCode'))
        <meta name="yandex-verification" content="{{ getSetting('yandexVerifyCode') }}" />
    @endif

    <!-- Facebook Open Graph -->
    @if (getSetting('facebookAuthorId'))
        <meta property="fb:admins" content="{{ getSetting('facebookAuthorId') }}" />
    @endif
    @if (getSetting('facebookAppId'))
        <meta property="fb:app_id" content="{{ getSetting('facebookAppId') }}" />
    @endif

    @include('includes.style')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @yield('custom_head')

    @if (getSetting('googleAnalyticsId'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ getSetting('googleAnalyticsId') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ getSetting('googleAnalyticsId') }}');
        </script>
    @endif
</head>

<body @if (Request::segment(1) !== null) class="bg-dark-blue relative" @endif>

    <div class="bg-dark-blue relative">
        <div class="container mx-auto px-6 lg:px-28 py-6 overflow-hidden lg:overflow-visible">

            <x-site.top-navbar />

            @yield('inner-content')
        </div>
    </div>

    @yield('outer-content')

    @if (Request::segment(2) !== 'read')
    <x-site.footer />
    @endif
    <x-site.bottom-navbar />

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('assets/themes/cork/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    @stack('custom_js')
</body>
</html>
