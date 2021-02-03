<!-- START FOOTER -->
<div class="mt-64 py-24 bg-dark-blue border-t-8 border-dark-blue-200 overflow-hidden lg:overflow-visible">
    <div class="container mx-auto">
        <div class="flex items-center justify-center">
            <img src="{{ asset('assets/himatif-white.png') }}" alt="">
            <span class="text-white text-4xl font-serif ml-3">
                {{ getSetting('siteName') }}
            </span>
        </div>
        <span class="flex justify-center mt-8 px-8 lg:px-80 text-center text-dark-blue-400 font-semibold">
            {{ getSetting('organizationTagLine') }}
        </span>
        <span class="flex justify-center text-bold text-white text-xl uppercase mt-6">
            Follow Us
        </span>
        <div class="mt-6 flex justify-center space-x-3">
            <img class="w-14 h-14 lg:w-16 lg:h-16" src="{{ asset('assets/media/media-youtube.png') }}" alt="Youtube Himatif">
            <img class="w-14 h-14 lg:w-16 lg:h-16" src="{{ asset('assets/media/media-instagram.png') }}" alt="Instagram Himatif">
            <img class="w-14 h-14 lg:w-16 lg:h-16" src="{{ asset('assets/media/media-facebook.png') }}" alt="Facebook Himatif">
        </div>
    </div>
</div>
<!-- END FOOTER -->