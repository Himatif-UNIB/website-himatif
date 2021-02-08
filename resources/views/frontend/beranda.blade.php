@extends('layouts.frontend')

@section('style-after')
<style>
    .modal {
        transition: opacity 0.25s ease;
    }
    body.modal-active {
        overflow-x: hidden;
        overflow-y: visible !important;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: rgba(110, 231, 183, var(--tw-bg-opacity));
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 3px 0;
        bottom: 120%;
        left: 50%;
        margin-left: -60px; /* Use half of the width (120/2 = 60), to center the tooltip */

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>
@endsection

@section('inner-content')
<!-- START JUMBOTRON -->
<div class="lg:flex justify-between mt-20 items-center">
    <div data-aos="fade-right" data-aos-delay="200">
        <h1 class="text-white md:text-left uppercase mb-12 text-center">
            <span class="text-6xl md:text-7xl font-bold tracking-widest block">{{ getSetting('organizationName') }}</span>
            <span class="text-2xl md:text-3xl tracking-wider font-light block">{{ getSetting('organizationUniversity') }}</span>
        </h1>

        <div class="text-center md:text-left">
            <span class="text-dark-blue-400 text-lg font-bold">
                {{ getSetting('organizationTagLine') }}
            </span>
        </div>

    </div>
    <img class="mt-16 lg:mt-0" src="{{ asset('assets/hero-img.png') }}" alt="" data-aos="zoom-in" data-aos-delay="600">
</div>
<!-- END JUMBOTRON -->
@endsection

@section('outer-content')
<div class="container mx-auto px-6 lg:px-28 py-6 mt-28">
    <div class="lg:flex justify-between items-center">
        <img src="{{ asset('assets/about-himatif.png') }}" class="mr-24" data-aos="fade-right" data-aos-delay="700">
        <div class="" data-aos="fade-up">
            <h2 class="text-dark-blue-800 text-2xl lg:text-4xl font-bold mb-6 mt-5 lg:mt-0">
                Sekilas Tentang {{ getSetting('organizationName') }}
            </h2>
            <span class="text-dark-blue-400 text-base font-bold leading-relaxed">
                {{ getSetting('organizationDesc') }}
            </span>
        </div>
    </div>

    <div class="mt-36">
        <h2 class="text-dark-blue-800 text-2xl lg:text-4xl font-bold mb-12 flex justify-center" data-aos="zoom-in-up">
            Bidang Organisasi
        </h2>
        <div class="grid grid-row md:grid-cols-2 lg:grid-cols-3 place-items-center"  data-aos="fade-up" data-aos-delay="500">
<<<<<<< HEAD
            <div class="modal-open border-2 cursor-pointer hover:border-gray-400 transition duration-500 ease-in-out w-64 h-64 lg:w-80 lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/KWU.png') }}" alt="">
=======
            @forelse ($divisions as $item)
            <div class="border-2 cursor-pointer hover:border-gray-400 transition duration-500 ease-in-out w-64 h-64 lg:w-80 lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ $item->media[0]->getFullUrl() }}" alt="{{ $item->name }}"
                    title="Bidang {{ $item->name }}">
>>>>>>> 181972b0f30c71ced6859c91e184e476d3e17d5e
            </div>
            @empty
            <div>
                Tidak ada data untuk ditampilkan
            </div>
            @endforelse
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal z-50 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-full md:w-4/6 mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-12 text-left px-6 md:px-12">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">

            </div>

            <!--Body-->
            <div class="relative mx-auto w-36 h-36 mb-2">
                <span class="flex items-center justify-center absolute right-1 top-4 w-6 h-6 rounded-full bg-green-300 cursor-pointer tooltip">
                    <svg class="w-10/12 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="tooltiptext">Coordinator</span>
                </span>
                <div class="overflow-hidden w-full h-full rounded-full">
                    <img class="object-cover object-center" src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                </div>
            </div>

            <div class="w-full flex flex-col items-center mb-6">
                <span class="block font-poppins font-semibold text-xl text-gray-700">Wahyu Syahputra</span>
                <span class="block font-poppins text-lg text-gray-500">G1A018093</span>
                <div class="w-48 text-center bg-category-button-green rounded-full mt-2">
                    <span class="text-category-text-green font-semibold">Information Technology</span>
                </div>
            </div>

            <div class="mb-3 flex items-center justify-between px-7 w-full h-12 border-2 border-gray-300 rounded-lg">
                <span class="font-poppins font-medium text-gray-800">Wahyu Syahputra</span>
                <span class="font-poppins text-gray-500">G1A018093</span>
            </div>
            <div class="mb-3 flex items-center justify-between px-7 w-full h-12 border-2 border-gray-300 rounded-lg">
                <span class="font-poppins font-medium text-gray-800">Wahyu Syahputra</span>
                <span class="font-poppins text-gray-500">G1A018093</span>
            </div>

            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button class="modal-close px-4 bg-indigo-500 py-2 rounded-lg text-white hover:bg-indigo-400">Tutup</button>
            </div>

        </div>
    </div>
</div>

<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
            event.preventDefault()
            toggleModal()
        })
    }

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };


    function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }
</script>
@endsection