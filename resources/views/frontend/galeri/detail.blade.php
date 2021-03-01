@extends('layouts.frontend')

@section('title', 'Galeri Foto '. getSetting('organizationName'))

@section('outer-content')

<div class="bg-dark-blue relative">
    <div class="container mx-auto px-6 lg:px-28 py-6">
        <div class="text-center">
            <h1 class="text-3xl text-white font-semibold">PMO Himatif (Panitia)</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut tempore facilis quasi beatae dolorum nostrum numquam necessitatibus dignissimos excepturi totam?</p>
        </div>
        <div class="grid grid-cols-4 mt-6">

            @foreach ($media as $m)
            <a href="#">
                <div class="w-full h-52 rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover" src="{{ $m->getUrl() }}" alt="">
                </div>
            </a>

            {{ $media->links() }}
            @endforeach

        </div>
    </div>
</div>

@endsection