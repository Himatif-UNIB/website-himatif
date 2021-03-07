<!-- START NAVBAR -->
<div class="flex justify-between items-center" id="navbar">
    <div class="flex items-center space-x-4">
        <img class="w-12 h-12" src="{{ getSiteLogo() }}" alt="{{ getSetting('organizationName') }} Logo">
        <span class="text-white font-bold text-2xl">{{ getSetting('organizationName') }}</span>
    </div>
    <div class=" invisible lg:visible">
        <ul class="flex items-center">
            <li class="px-6 {{ request()->is('/') ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="{{ route('beranda') }}">Beranda</a>
            </li>
            <li
                class="px-6 {{ request()->is('struktur') ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="{{ route('struktur') }}">Struktur</a>
            </li>
            <li class="px-6 {{ request()->is('galeri') || request()->is('galeri/*') ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="{{ route('galeri') }}">Galeri</a>
            </li>
            <li class="px-6 {{ request()->is('blog') || request()->is('blog/*')  ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="{{ route('blog.index') }}">Blog</a>
            </li>
            @auth
                <button
                    class="border-2 rounded-xl px-5 py-1 border-dark-blue-200 focus:outline-none hover:bg-orange-600 text-dark-blue-400 hover:text-white hover:border-white">
                    <a href="{{ route('index') }}">Dasbor</a>
                </button>
            @endauth

            @guest
            <button class="border-2 rounded-xl px-5 py-1 border-dark-blue-200 focus:outline-none hover:bg-orange-600 text-dark-blue-400 hover:text-white">
                <a href="{{ route('login') }}">Login</a>
            </button>
            @endguest
        </ul>
    </div>
</div>
<!-- END NAVBAR -->
