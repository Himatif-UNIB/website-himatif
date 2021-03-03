@extends('layouts.frontend')

@section('title', 'Galeri Foto '. getSetting('organizationName'))

@section('outer-content')

<div class="bg-dark-blue relative">
    <div class="container mx-auto px-6 lg:px-28 py-6">
        <div class="text-center">
            <h1 class="text-3xl text-white font-semibold">{{ $album->title }}</h1>
            <p>{{ $album->description }}</p>
        </div>
        <div class="grid grid-cols-4 mt-6">

            @foreach ($album->media as $picture)
            <a href="#">
                <div class="w-full h-52 rounded-lg overflow-hidden mr-2 m-2">
                    <img class="w-full h-full object-cover" src="{{ $picture->getFullUrl() }}" alt="">
                </div>
            </a>
            @endforeach

        </div>
    </div>
</div>

@endsection