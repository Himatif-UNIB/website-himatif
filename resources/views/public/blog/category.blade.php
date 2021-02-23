@extends('layouts.frontend')
@section('title', $category->name .' - Blog '. getSetting('organizationName'))

@section('inner-content')
<div class="px-2 mt-12 lg:mt-24 lg:px-0">

    <!-- START JUMBOTRON -->
    <div class="relative">
        <img class="relative lg:h-auto lg:static h-72 object-cover left-1/2 right-1/2 max-w-none lg:max-w-full -ml-half lg:ml-0 w-mammoth" src="{{ asset('assets/bg-article.png') }}">
        {{-- <img src="{{ asset('assets/bg-article.png') }}"> --}}
        <h1 class="px-8 lg:px-24 text-6xl lg:text-9xl font-serif text-white absolute bottom-0">{{ $category->name }}</h1>
    </div>
    <!-- END JUMBOTRON -->

    <div class="lg:px-24">

        <!-- START CATEGORY -->
        <div class="mt-12 flex overflow-x-auto">
            <div class="w-min border-2 rounded-full text-center font-bold px-3 py-1 mr-4 border-dark-blue-400 text-dark-blue-400">
                <a href="{{ route('blog.index') }}">Semua</a>
            </div>
            @foreach ($categories as $item)
                @if ($category->id == $item->id)
                <div class="w-min border-2 rounded-full text-center font-bold px-3 py-1 mr-4 border-orange-600 text-orange-600">
                    <a href="{{ route('blog.category', ['id' => $item->id, 'slug' => $item->slug]) }}/">{{ $item->name }}</a>
                </div>
                @else
                <div class="w-min border-2 rounded-full text-center font-bold px-3 py-1 mr-4 border-dark-blue-400 text-dark-blue-400">
                    <a href="{{ route('blog.category', ['id' => $item->id, 'slug' => $item->slug]) }}/">{{ $item->name }}</a>
                </div>
                @endif
            @endforeach
        </div>
        <!-- END CATEGORY -->

        <!-- START CONTENT -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16">
            @forelse ($posts as $post)
            <div class="mb-12">
                <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
                    <a href="{{ route('blog.post') }}">
                        @isset($post->media[0])
                            <img class="w-full h-full object-cover object-center" src="{{ $post->media[0]->getFullUrl() }}" alt="{{ $post->title }}">
                        @else
                            <img class="w-full h-full object-cover object-center" src="{{ asset('assets/bg-article.png') }}" alt="{{ $post->title }}">
                        @endisset
                    </a>
                </div>
                <div class="text-white text-lg font-bold mt-3">
                   <a href="{{ route('blog.post', ['post' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a>
                </div>
                <div class="text-dark-blue-400 text-base font-bold mt-3">
                    @empty($post->excerpt)
                        {{ \Str::limit(strip_tags($post->content, 6)) }}
                    @else
                        {{ $post->excerpt }}
                    @endempty
                </div>
            </div>
            @empty
            <div class="mb-12">
                <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
                    <a href="{{ route('blog.post') }}">
                        <img class="w-full h-full object-cover object-center" src="{{ asset('assets/bg-article.png') }}" alt="Tidak ada posting">
                    </a>
                </div>
                <div class="text-white text-lg font-bold mt-3">
                    Tidak ada posting dalam kategori ini
                </div>
                <div class="text-dark-blue-400 text-base font-bold mt-3">
                    Tidak ada posting untuk ditampilkan, kami akan menambahkan beberapa...
                </div>
            </div>
            @endforelse
        </div>
        <!-- END CONTENT-->
    </div>

</div>
@endsection