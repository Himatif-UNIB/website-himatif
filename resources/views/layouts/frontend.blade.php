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
    @yield('style-after')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @yield('custom_head')
</head>

<body @if (Request::segment(1) !== null) class="bg-dark-blue relative" @endif>

    <div class="bg-dark-blue relative">
        <div class="container mx-auto px-6 lg:px-28 py-6 overflow-hidden lg:overflow-visible">

            @include('includes.navbar')

            @yield('inner-content')
        </div>
    </div>

    @yield('outer-content')

    @include('includes.footer')

    @include('includes.bottom-navbar')

    @include('includes.script')
    @yield('script-after')

    @stack('custom_js')

    @if (getSetting('googleAnalyticsId'))
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', '{{ getSetting('googleAnalyticsId') }}', 'auto');
            ga('send', 'pageview');

        </script>
    @endif
</body>

</html>
