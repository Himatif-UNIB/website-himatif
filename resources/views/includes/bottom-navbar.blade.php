<!-- START BOTTOM NAVBAR -->
<div class="w-full md:hidden">
    <section id="bottom-navigation" class="block fixed inset-x-0 bottom-0 z-10 bg-dark-blue-100 shadow">
        <div id="tabs" class="flex justify-between">
            <a href="{{ route('beranda') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-200">
                <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                  </svg>
                <span class="tab tab-home block text-xs">Beranda</span>
            </a>
            <a href="{{ route('struktur') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-400">
                <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                  </svg>
                <span class="tab tab-kategori block text-xs">Struktur</span>
            </a>
            <a href="{{ route('galeri') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-400">
                <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                </svg>
                <span class="tab tab-kategori block text-xs">Galeri</span>
            </a>
            <a href="{{ route('blog.index') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-400">
                <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                    <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                  </svg>
                <span class="tab tab-explore block text-xs">Blog</span>
            </a>
            <a href="{{ route('login') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-400">
                <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                  </svg>
                <span class="tab tab-account block text-xs">Dashboard</span>
            </a>
        </div>
    </section>
</div>
<!-- END BOTTOM NAVBAR -->