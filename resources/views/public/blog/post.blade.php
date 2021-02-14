@extends('layouts.frontend')
@section('title', $post->title .' | '. getSetting('organizationName'))

@section('inner-content')
    <!-- START POST -->
    <div class="mt-12 lg:mt-32 px-2 lg:px-24">
        <div class="relative rounded-2xl overflow-hidden h-80 lg:h-mammoth">
            <div class="absolute bottom-0 w-full h-1/2" style="
            background-image: linear-gradient(to top, rgba(48,67,82,1), rgba(48,67,82,0));
            "></div>
            @isset($post->media[0])
                <img class="w-full h-full object-cover" src="{{ $post->media[0]->getFullUrl() }}" alt="{{ $post->title }}">
            @else
                <img class="w-full h-full object-cover"
                    src="https://upload.wikimedia.org/wikipedia/commons/f/f5/Poster-sized_portrait_of_Barack_Obama.jpg"
                    alt="{{ $post->title }}">
            @endisset
        </div>

        <div class="mt-16 px-2 lg:px-20">
            <h1 class="text-white text-center text-2xl lg:text-4xl font-bold">{{ $post->title }}</h1>
            <div class="flex justify-center mt-12">
                <div class="w-16 h-16 lg:w-28 lg:h-28">
                    @isset($post->user->media[0])
                        <img class="rounded-full"
                            src="{{ $post->user->media[0]->getFullUrl() }}" alt="{{ $post->user->name }}">
                    @else
                        <img class="rounded-full"
                            src="{{ asset('assets/images/avatar-1.png') }}" alt="{{ $post->user->name }}">
                    @endisset
                </div>
            </div>
            <div class="flexs justify-center mt-2 text-dark-blue-400 font-semibold text-center">
                Diposting oleh {{ $post->user->name }} pada
                {{ \Carbon\Carbon::parse($post->created_at)->format('l, d M Y H:i') }}
                @foreach ($post->categories as $category)
                    <div class="w-min px-5 bg-category-button-green text-category-text-green font-semibold rounded-md mt-2">
                        <a
                            href="{{ route('blog.category', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 text-white text-lg leading-relaxed">
                {!! $post->content !!}
            </div>

            <!-- START COMMENT-->
            <div class="mb-24 mt-24 lg:mt-36 lg:mb-0">
                <div class="flex items-center">
                    <div class="w-14 h-14 rounded-full bg-gray-400 overflow-hidden">
                        @isset($post->user->media[0])
                            <img class="w-full h-full object-cover object-center"
                                src="{{ $post->user->media[0]->getFullUrl() }}" alt="{{ $post->user->name }}">
                        @else
                            <img class="w-full h-full object-cover object-center"
                                src="{{ asset('assets/images/avatar-1.png') }}" alt="{{ $post->user->name }}">
                        @endisset
                    </div>
                    <div class="flex flex-col ml-4">
                        <span class="font-semibold text-white">{{ $post->user->name }}</span>
                        <span
                            class="text-dark-blue-400">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <!-- END COMMENT -->

            <x-site.blog.comments :comments="$comments" :post="$post" />
            <x-site.blog.comment-form :post="$post" />

        </div>
    </div>
    <!-- END POST -->
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@16.1.3/dist/smooth-scroll.min.js"></script>
    <script>
        let scroll = new SmoothScroll({
            easing: 'linear'
        });
        let commentForm = document.querySelector('#comment-form');
        
        @if (session()->has('errors') || session()->has('success'))
            scroll.animateScroll(commentForm);
        @endif

        let replyComments = document.querySelectorAll('.reply-comment');
        let giveReplyMessageContainer = document.querySelector('.give-reply');
        let replyToField = document.querySelector('#reply-to');
        let replyToName = document.querySelector('#reply-to-name');

        replyComments.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let id = btn.getAttribute('data-reply-to');
                let name = btn.getAttribute('data-reply-to-name');

                giveReplyMessageContainer.classList.add('mb-5');
                giveReplyMessageContainer.innerHTML = `Berikan balasan untuk komentar <b>${name}</b><br>
                <a href="#" class="cancel-give-reply text-orange-600">Batal</a>`;

                replyToField.value = id;
                replyToName.value = name;

                let commentForm = document.querySelector('#comment-form');
                scroll.animateScroll(commentForm);
            })
        });

        $(document).on('click', '.cancel-give-reply', function (e) {
            e.preventDefault();

            replyToField.value = 0;
            giveReplyMessageContainer.classList.remove('mb-5');
            giveReplyMessageContainer.innerHTML = '';
        });
    </script>
@endpush
