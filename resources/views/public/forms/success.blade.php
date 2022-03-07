<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        input[type=text] {
            border-bottom: 1px solid #92A4B2;
            padding: 2px 0 2px 0;
        }

    </style>

    <title>Form</title>
</head>

<body class="bg-dark-blue min-h-screen">

    <div class="flex items-center">
        <div class="bg-gray-50 rounded-lg md:max-w-md mx-auto space-y-4 p-7 shadow-lg">

            <div class="flex justify-center relative">
                <span class="absolute top-0 right-0">
                    <svg width="37" height="35" viewBox="0 0 37 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M36.5734 16.3631L33.349 12.7218L33.7997 7.90076C33.8864 7.04598 33.297 6.25958 32.4649 6.07153L27.6803 5.01159L25.184 0.840241C24.7333 0.105126 23.8145 -0.202597 22.9998 0.139317L18.5099 2.03694L14.02 0.139317C13.2226 -0.202597 12.2865 0.105126 11.8531 0.840241L9.33946 4.9945L4.57222 6.05443C3.72278 6.24248 3.13338 7.01179 3.22005 7.86657L3.67078 12.7047L0.429052 16.3631C-0.143017 17.0128 -0.143017 17.9701 0.429052 18.6198L3.67078 22.2612L3.22005 27.0992C3.13338 27.954 3.72278 28.7404 4.55488 28.9285L9.33946 30.0055L11.8358 34.1598C12.2865 34.8949 13.2226 35.2026 14.02 34.8607L18.5099 32.9289L22.9998 34.8265C23.7972 35.1684 24.7333 34.8607 25.1667 34.1256L27.663 29.9713L32.4476 28.8943C33.297 28.7062 33.8691 27.9198 33.7824 27.065L33.3317 22.2441L36.5561 18.6027C36.8387 18.2973 36.9968 17.8996 37 17.4862C37.0032 17.0728 36.8512 16.6728 36.5734 16.3631V16.3631ZM15.4415 22.3295L11.7664 18.7052C11.6059 18.547 11.4786 18.3591 11.3918 18.1523C11.3049 17.9455 11.2602 17.7238 11.2602 17.5C11.2602 17.2762 11.3049 17.0545 11.3918 16.8477C11.4786 16.6409 11.6059 16.453 11.7664 16.2948C11.9269 16.1365 12.1174 16.0109 12.3271 15.9253C12.5368 15.8396 12.7616 15.7955 12.9886 15.7955C13.2155 15.7955 13.4403 15.8396 13.65 15.9253C13.8597 16.0109 14.0502 16.1365 14.2107 16.2948L16.655 18.7052L22.7917 12.6534C22.9522 12.4951 23.1428 12.3695 23.3525 12.2839C23.5622 12.1982 23.7869 12.1541 24.0139 12.1541C24.2409 12.1541 24.4656 12.1982 24.6753 12.2839C24.885 12.3695 25.0755 12.4951 25.236 12.6534C25.3965 12.8116 25.5238 12.9995 25.6107 13.2063C25.6976 13.4131 25.7423 13.6348 25.7423 13.8586C25.7423 14.0825 25.6976 14.3041 25.6107 14.5109C25.5238 14.7177 25.3965 14.9056 25.236 15.0639L17.8858 22.3124C17.2271 22.9963 16.1176 22.9963 15.4415 22.3295V22.3295Z"
                            fill="#1CEE18" />
                    </svg>
                </span>
                <div class="w-3/4">
                    <lottie-player autoplay loop mode="normal"
                        src="{{ asset('assets/lottie-animation/form-submit.json') }}"></lottie-player>
                </div>
            </div>
            <div class="text-center space-y-2 font-poppins">
                <p class="text-2xl text-dark-blue-800 ">Tanggapan anda telah direkam</p>
                <p class="text-gray-500">
                    @empty($form->post_message)
                        Terimakasih telah memberikan tanggapan
                    @else
                        {!! $form->post_message !!}
                    @endempty
                </p>
            </div>
            <div class="mt-8 text-center">
                <a href="{{ route('form.show', ['slug' => $form->slug, 'form' => $form->id]) }}"
                    class="bg-orange-500 hover:bg-orange-600 font-semibold text-white px-3 py-1 rounded-lg focus:outline-none text-lg">Berikan
                    Tanggapan Lain</a>

            </div>

        </div>
    </div>


    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>
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
