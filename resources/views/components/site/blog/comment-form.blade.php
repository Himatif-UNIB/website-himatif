<!-- comment form -->
<div class="flex mx-auto items-center justify-center shadow-lg mt-6 mx-8 mb-4 max-w-lg">
    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2"
        action="{{ route('blog.post_comment', ['post' => $post->id, 'slug' => $post->slug]) }}" method="post"
        id="comment-form">
        @csrf

        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Berikan sebuah komentar</h2>

            <div class="w-full md:w-full px-3 mb-2 mt-2">
                @empty(old('reply_to'))
                    <div class="give-reply"></div>

                    <input type="hidden" name="reply_to" value="" id="reply-to">
                    <input type="hidden" name="reply_to_name" value="" id="reply-to-name">
                @else
                <div class="give-reply mb-5">
                    Berikan balasan untuk komentar <b>{{ old('reply_to_name') }}</b>
                    <br>
                    <a href="#" class="cancel-give-reply text-orange-600">Batal</a>
                </div>

                <input type="hidden" name="reply_to" value="{{ old('reply_to') }}" id="reply-to">
                <input type="hidden" name="reply_to_name" value="{{ old('reply_to_name') }}" id="reply-to-name">
                @endempty
                    
                @auth
                    @if (session()->has('success'))
                        <span class="text-orange-600 md:hover:text-blue-600">
                            {{ session()->get('success') }}</span>
                    @else
                        <label for="comment-content" class="text-orange-600 md:hover:text-blue-600">Berikan komentar sebagai
                            {{ auth()->user()->name }}</label>
                    @endif
                @else
                    @if (session()->has('success'))
                        <div class="mb-2">
                            <span class="text-orange-600">
                                {{ session()->get('success') }}</span>
                        </div>
                    @endif
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Nama: <span class="text-red-600">*</span>
                        </label>
                        <input
                            class="@error('name') border-red-500 @enderror focus:outline-none focus:ring-2
                                focus:ring-purple-600 focus:border-transparent shadow appearance-none border border-gray-400
                                rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="name" id="name" type="text" value="{{ old('name', session()->get('commentName')) }}" required>

                        @error('name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email: <span class="text-red-600">*</span>
                        </label>
                        <input
                            class="@error('email') border-red-500 @enderror focus:outline-none focus:ring-2
                                focus:ring-purple-600 focus:border-transparent shadow appearance-none border border-gray-400
                                rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="email" id="email" type="email" value="{{ old('email', session()->get('commentEmail')) }}" required>

                        @error('email')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="website">
                            Website:
                        </label>
                        <input
                            class="@error('website') border-red-500 @enderror focus:outline-none focus:ring-2
                                focus:ring-purple-600 focus:border-transparent shadow appearance-none border border-gray-400
                                rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="website" id="website" type="url" value="{{ old('website', session()->get('commentWebsite')) }}">

                        @error('website')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                @endauth
            </div>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="comment-content">
                    Komentar: <span class="text-red-600">*</span>
                </label>
                <textarea
                    class="@error('content') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="content" placeholder='' id='comment-content' required>{{ old('content') }}</textarea>

                @error('content')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-xs md:text-sm pt-px">Kode HTML tidak diizinkan.</p>
                </div>
                <div class="-mr-1">
                    <input type='submit'
                        class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                        value='Posting Komentar'>
                </div>
            </div>
    </form>
</div>
</div>
