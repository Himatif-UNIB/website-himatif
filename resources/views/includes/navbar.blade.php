<!-- START NAVBAR -->
<div id="navbar" class="flex justify-between items-center">
    <div class="flex items-center">
        <img class="" src="{{ asset('assets/brand-logo.png') }}" alt="">
        <span class="uppercase text-white font-bold ml-4 text-3xl">Himatif</span>
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
                <a href="{{ route('blog') }}">Blog</a>
            </li>
            <button class="border-2 rounded-xl px-5 py-1 border-dark-blue-200 focus:outline-none hover:bg-orange-600 hover:text-white hover:border-white ml-3">
                Login
            </button>
        </ul>
    </div>
</div>
<!-- END NAVBAR -->