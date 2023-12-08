<!-- START NAVBAR -->
<div class="flex justify-between items-center px-6 py-6 uppercase font-semibold" id="navbar">
    <div class="flex items-center space-x-4">
        <a href="{{ route('beranda') }}" class="flex items-center space-x-3">
            <img class="w-12 h-12" src="{{ getSiteLogo() }}" alt="{{ getSetting('organizationName') }} Logo">
            <span class="text-white font-bold text-2xl">{{ getSetting('organizationName') }}</span>
        </a>
    </div>
    <div class="invisible lg:visible">
        <ul class="flex items-center">
            <li class="px-5 {{ request()->is('/') ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="{{ route('beranda') }}">Beranda</a>
            </li>
            <li class="px-5 {{ request()->is('struktur') ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="{{ route('struktur') }}">Struktur</a>
            </li>
            <li
                class="px-5 {{ request()->is('galeri') || request()->is('galeri/*') ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="{{ route('galeri') }}">Galeri</a>
            </li>
            <li
                class="px-5 {{ request()->is('blog') || request()->is('blog/*') ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="{{ route('blog.index') }}">Blog</a>
            </li>
            <li
                class="px-5 {{ request()->is('blog') || request()->is('blog/*') ? 'text-gray-50' : 'text-dark-blue-400' }} hover:text-gray-50">
                <a href="http://itshowcase.himatifunib.org/">IT SHOWCASE</a>
            </li>
            <li class="px-5 text-dark-blue-400 hover:text-gray-50">
                @if (auth()->check())
                    <a href="/home">Dasbor</a>
                @else
                    <a href="{{ route('auth.login') }}">Login</a>
                @endif
            </li>
        </ul>
    </div>
</div>
<!-- END NAVBAR -->
