@extends('layouts.frontend')

@section('inner-content')
<!-- START POST -->
<div class="mt-12 lg:mt-32 px-2 lg:px-24">
    <div class="relative rounded-2xl overflow-hidden h-80 lg:h-mammoth">
        <div class="absolute bottom-0 w-full h-1/2" style="
        background-image: linear-gradient(to top, rgba(48,67,82,1), rgba(48,67,82,0));
        "></div>
        <img class="w-full h-full object-cover" src="https://upload.wikimedia.org/wikipedia/commons/f/f5/Poster-sized_portrait_of_Barack_Obama.jpg" alt="">
    </div>

    <div class="mt-16 px-2 lg:px-20">
        <h1 class="text-white text-center text-2xl lg:text-4xl font-bold">These Are The 10 Most Beautiful Blog Designs In The World</h1>
        <div class="flex justify-center mt-12">
            <div class="w-16 h-16 lg:w-28 lg:h-28">
                <img class="rounded-full" src="https://widgetwhats.com/app/uploads/2019/11/free-profile-photo-whatsapp-4.png" alt="">
            </div>
        </div>
        <div class="flex justify-center mt-6 text-dark-blue-400 font-semibold text-center">
            By Wahyu Syahputra, updated on June 14th, 2019
        </div>
        <div class="mt-8 text-white text-lg leading-relaxed">
            It’s no secret that blogs are the pillar of any successful company website. A frequently updated blog will drive traffic to the brand, guide users with targeted content, and act as a vital tool to engage with the broader community. Alongside being a low-cost marketing strategy with a lucrative payoff, blogs are also the perfect way to establish your brand identity and grow a loyal following.

            <br>
            <br>

            Creating engaging, information-rich content for your readers, however, is only half of the job: equally important is presenting the content in a visually stimulating way. When it comes to blog design, there are a variety of different factors to look at—from font sizes and text width, to hierarchy and calls-to-action. Uninspiring blog design is a sure fire way to lose
            interest—or even customers.

            <br>
            <br>

            Are you a budding UI designer exasperated by boring blogs? We’ve rounded up ten blogs and online magazines that showcase the very best of creative editorial design. To help us on our way, I’ve enlisted the expertise of CareerFoundry’s resident UI designer Amy, who’ll be shedding light on why each blog has hit the nail on the head with their UI
        </div>

        <!-- START COMMENT-->
        <div class="mb-24 mt-24 lg:mt-36 lg:mb-0">
            <div class="flex items-center">
                <div class="w-14 h-14 rounded-full bg-gray-400 overflow-hidden">
                    {{-- <img class="w-full h-full object-cover object-center" src="" alt=""> --}}
                </div>
                <div class="flex flex-col ml-4">
                    <span class="font-semibold text-white">Wahyu Syahputra</span>
                    <span class="text-dark-blue-400">2 hari yang lalu</span>
                </div>
            </div>
            <div style="margin-left: 4.5rem">
                <span class="text-gray-300">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eius dolorum asperiores.</span>
            </div>
        </div>
        <!-- END COMMENT -->

    </div>
</div>
<!-- END POST -->
@endsection