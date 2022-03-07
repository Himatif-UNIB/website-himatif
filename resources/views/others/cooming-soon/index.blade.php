<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Under Construction</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/themes/cooming-soon/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/cooming-soon/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/themes/cooming-soon/css/style.css') }}" rel="stylesheet">

    @if (getSetting('googleVerifyCode'))
        <meta name="google-site-verification" content="{{ getSetting('googleVerifyCode') }}" />
    @endif
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center">

            <h1>Under Construction</h1>
            <h2>Situs ini belum tersedia dan akan segera hadir dalam beberapa waktu. Kami masih bekerja untuk itu.</h2>
            <div class="countdown d-flex justify-content-center" data-count="2022/03/20">
                <div>
                    <h3>%d</h3>
                    <h4>Days</h4>
                </div>
                <div>
                    <h3>%h</h3>
                    <h4>Hours</h4>
                </div>
                <div>
                    <h3>%m</h3>
                    <h4>Minutes</h4>
                </div>
                <div>
                    <h3>%s</h3>
                    <h4>Seconds</h4>
                </div>
            </div>

            <div class="social-links text-center">
                <a target="_blank" href="https://twitter.com/himatif_unib" class="twitter"><i
                        class="bi bi-twitter"></i></a>
                <a target="_blank" href="https://www.facebook.com/himatifunibofficial/" class="facebook"><i
                        class="bi bi-facebook"></i></a>
                <a target="_blank" href="https://www.instagram.com/himatifunib/?hl=en" class="instagram"><i
                        class="bi bi-instagram"></i></a>
                <a target="_blank" href="https://www.youtube.com/channel/UC3qn66dHS-8-VCJ5FpBMoVw"
                    class="youtube"><i class="bi bi-youtube"></i></a>
            </div>

        </div>
    </header>
    <!-- End #header -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>HIMATIF UNIB</span></strong>. All Rights Reserved.
            </div>
        </div>
    </footer>
    <!-- End #footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/themes/cooming-soon/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/themes/cooming-soon/js/main.js') }}"></script>

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
