<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Document</title>
</head>
<body class="bg-dark-blue">

    <div class="flex h-screen items-center">
        <div class="bg-gray-50 rounded-lg md:max-w-md mx-auto space-y-4 p-7 shadow-lg">

            <div class="flex justify-center relative">
                <div class="w-3/4">
                    <lottie-player autoplay loop mode="normal" src="{{ asset('assets/lottie-animation/errors.json') }}"></lottie-player>
                </div>
            </div>
            <div class="text-center space-y-2 font-poppins">
                <p class="text-2xl text-dark-blue-800 ">@yield('code') - @yield('title')</p>
                <p class="text-gray-500">@yield('message')</p>
            </div>
            <div class="mt-8 text-center">
                <a href="{{ route('beranda') }}" class="bg-orange-500 hover:bg-orange-600 font-semibold text-white px-3 py-1 rounded-lg focus:outline-none text-lg">Kembali ke Beranda</a>
            </div>

        </div>
    </div>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>

</body>
</html>