<!-- START NAVBAR -->
<div id="navbar" class="flex justify-between items-center">
    <div class="flex items-center">
        <img class="" src="{{ getSiteLogo() }}" alt="{{ getSetting('organizationName') }} Logo">
        <span class="ml-3 text-white font-bold text-2xl uppercase">Himatif</span>
    </div>
    <div class="text-dark-blue-400 invisible lg:visible">
        <ul class="flex items-center">
            <li class="px-6 hover:text-gray-50">
                <a href="{{ route('beranda') }}">Beranda</a>
            </li>
            <li class="px-6 hover:text-gray-50">
                <a href="{{ route('struktur') }}">Struktur</a>
            </li>
            <li class="px-6 hover:text-gray-50">
                <a href="{{ route('galeri') }}">Galeri</a>
            </li>
            <li class="px-6 hover:text-gray-50">
                <a href="{{ route('blog') }}">Blog</a>
            </li>
            @auth
            <button class="border-2 rounded-xl px-5 py-1 border-dark-blue-200 focus:outline-none hover:bg-orange-600 hover:text-white hover:border-white">
                <a href="{{ route('index') }}">Dasbor</a>
            </button>
            @endauth

            @guest
            <button class="border-2 rounded-xl px-5 py-1 border-dark-blue-200 focus:outline-none hover:bg-orange-600 hover:text-white hover:border-white">
                <a href="{{ route('login') }}">Login</a>
            </button>
            @endguest
        </ul>
    </div>
</div>
<!-- END NAVBAR -->