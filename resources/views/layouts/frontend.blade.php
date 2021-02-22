<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('includes.style')
    @yield('style-after')

    <style>

    </style>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>{{ getSetting('organizationName') }}</title>
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

</body>
</html>