@extends('layouts.frontend')

@section('style-after')
    <style>
        .replied-name{
            transition: 0.2s;
        }

        .replied-name:hover{
            transform: translateY(-3px);
        }
    </style>
@endsection

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
                    src="{{ asset('assets/bg-article.png') }}"
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
            <div class="mt-8 mb-32 text-white text-lg leading-relaxed">
                {!! $post->content !!}
            </div>

            <div class="flex mx-auto items-center justify-center shadow-lg mt-6 mb-4 max-w-lg">
                <form class="w-full bg-dark-blue-400 rounded-lg px-6 py-5" action="">
                    <div class="flex items-center space-x-5 mb-3">
                        <div>
                            <span class="text-dark-blue-800 text-lg font-semibold mb-2">Komentar</span>
                        </div>
                        <div class="bg-dark-blue-800 flex items-center text-white space-x-2 px-2 rounded-md text-sm py-1 cursor-pointer replied-name">
                            <span>
                                <svg class="stroke-current text-white" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                  </svg>
                            </span>
                            <span>Wahyu</span>
                        </div>
                    </div>

                    <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                        <span class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Nama" class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10"/>
                    </div>
                    <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                        <span class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Email" class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10"/>
                    </div>
                    <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                        <span class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <textarea placeholder="Komentar" class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10"></textarea>
                    </div>
                    <div class="text-center">
                        <button class="bg-orange-500 hover:bg-orange-600 font-bold py-1 px-4 rounded inline-flex items-center text-white">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>

            <div class="flex mx-auto items-center justify-center shadow-lg mt-6 mb-4 max-w-lg">
                <form class="w-full bg-dark-blue-400 rounded-lg px-6 py-5" action="">
                    <div class="flex items-center space-x-5 mb-3">
                        <div>
                            <span class="text-dark-blue-800 text-lg font-semibold mb-2">Komentar</span>
                        </div>
                        <div class="bg-dark-blue-800 flex items-center text-white space-x-2 px-2 rounded-md text-sm py-1 cursor-pointer replied-name">
                            <span>
                                <svg class="stroke-current text-white" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                  </svg>
                            </span>
                            <span>Wahyu</span>
                        </div>
                    </div>

                    <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                        <span class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <textarea placeholder="Komentar" class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10"></textarea>
                    </div>
                    <div class="text-center">
                        <button class="bg-orange-500 hover:bg-orange-600 font-bold py-1 px-4 rounded inline-flex items-center text-white">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-14">
                <p class="text-white font-semibold text-lg">2 Komentar</p>
            </div>

            <div class="mt-10">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/avatar-1.png') }}" alt="">
                    </div>
                    <div>
                        <div class="flex items-center space-x-3">
                            <span class="text-white font-semibold">Wahyu Syahputra</span>
                            <span class="bg-dark-blue-400 px-2 rounded-full text-sm text-white font-semibold">Penulis</span>
                        </div>
                        <p class="text-dark-blue-200">2 Hari yang lalu</p>
                    </div>
                </div>
                <div style="margin-left: 3.8rem;">
                    <span class="text-white">Lorem, ipsum dolor. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum consectetur, esse distinctio architecto sequi incidunt quasi totam quis quae explicabo consequuntur praesentium iusto dolorum obcaecati cum fugit necessitatibus aliquid aspernatur.</span>
                    <p class="mt-3 w-10 text-dark-blue-400 font-semibold cursor-pointer hover:underline">Balas</p>
                </div>

                <div class="mt-12 ml-16">
                    <div class="flex items-center space-x-5">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img src="{{ asset('assets/images/avatar-1.png') }}" alt="">
                        </div>
                        <div>
                            <div class="flex items-center space-x-3">
                                <span class="text-white font-semibold">Wahyu Syahputra</span>
                                <span class="bg-dark-blue-400 px-2 rounded-full text-sm text-white font-semibold">Penulis</span>
                            </div>
                            <p class="text-dark-blue-200">2 Hari yang lalu</p>
                        </div>
                    </div>
                    <div style="margin-left: 3.8rem;">
                        <span class="text-white">Lorem, ipsum dolor. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum consectetur, esse distinctio architecto sequi incidunt quasi totam quis quae explicabo consequuntur praesentium iusto dolorum obcaecati cum fugit necessitatibus aliquid aspernatur.</span>
                    </div>
                </div>
            </div>

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
