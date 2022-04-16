<div class="flex mx-auto items-center justify-center shadow-lg mt-6 mb-4 max-w-lg">
    @guest
        <form class="w-full bg-dark-blue-400 rounded-lg px-6 py-5" id="comment-form"
            action="{{ route('blog.post_comment', ['post' => $post->id, 'slug' => $post->slug]) }}" method="POST">
            @csrf

            <div class="flex items-center space-x-5 mb-3">
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <span class="text-dark-blue-800 text-lg font-semibold mb-2">Komentar</span>
                </div>
                {{-- <div
                    class="bg-dark-blue-800 flex items-center text-white space-x-2 px-2 rounded-md text-sm py-1 cursor-pointer move-y-animation">
                    <span>
                        <svg class="stroke-current text-white" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        </svg>
                    </span>
                    <span>HIMATIF</span>
                </div> --}}
            </div>

            @empty(old('reply_to'))
                <div class="give-reply"></div>

                <input type="hidden" name="reply_to" value="" id="reply-to">
                <input type="hidden" name="reply_to_name" value="" id="reply-to-name">
            @else
                <div class="give-reply mb-5">
                    Berikan balasan untuk komentar <b>{{ old('reply_to_name') }}</b>
                    <br>
                    <a href="#" class="cancel-give-reply text-white">Batal</a>
                </div>

                <input type="hidden" name="reply_to" value="{{ old('reply_to') }}" id="reply-to">
                <input type="hidden" name="reply_to_name" value="{{ old('reply_to_name') }}" id="reply-to-name">
            @endempty

            @if (session()->has('success'))
                <div class="mb-2">
                    <span class="text-orange-600">
                        {{ session()->get('success') }}</span>
                </div>
            @endif

            <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                <span
                    class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <input type="text" placeholder="Nama" name="name" value="{{ old('name', session()->get('commentName')) }}"
                    class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10" />

                @error('name')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                <span
                    class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <input type="text" placeholder="Email" name="email" value="{{ old('email', session()->get('commentEmail')) }}"
                    class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10" />
            </div>
            <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                <span
                    class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                        </path>
                    </svg>
                </span>
                <input type="text" placeholder="Website" name="website" value="{{ old('website', session()->get('commentWebsite')) }}"
                    class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10" />
            </div>
            <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                <span
                    class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <textarea placeholder="Komentar" name="content"
                    class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10">{{ old('content') }}</textarea>
            </div>
            <div class="text-center">
                <button
                    type="submit"
                    class="bg-orange-500 hover:bg-orange-600 font-bold py-1 px-4 rounded inline-flex items-center text-white">
                    Kirim
                </button>
            </div>
        </form>
    @endguest

    @auth
        <div class="flex mx-auto items-center justify-center shadow-lg mt-6 mb-4 max-w-lg w-full">
            <form class="w-full bg-dark-blue-400 rounded-lg px-6 py-5" action="">
                <div class="flex items-center space-x-5 mb-3">
                    <div>
                        <span class="text-dark-blue-800 text-lg font-semibold mb-2">Komentar</span>
                    </div>
                    <div
                        class="bg-dark-blue-800 flex items-center text-white space-x-2 px-2 rounded-md text-sm py-1 cursor-pointer move-y-animation">
                        <span>
                            <svg class="stroke-current text-white" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                            </svg>
                        </span>
                        <span>Beri komentar sebagai {{ auth()->user()->name }}</span>
                    </div>
                </div>

                <div class="relative flex w-full flex-wrap items-stretch mb-3 py-1">
                    <span
                        class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <textarea placeholder="Komentar"
                        class="px-3 py-3 placeholder-gray-400 text-white relative bg-dark-blue-800 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10"></textarea>
                </div>
                <div class="text-center">
                    <button
                        class="bg-orange-500 hover:bg-orange-600 font-bold py-1 px-4 rounded inline-flex items-center text-white">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    @endauth
</div>