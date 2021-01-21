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
</style>
@endsection

@section('inner-content')
<!-- START JUMBOTRON -->
<div class="lg:flex justify-between mt-20 items-center">
    <div data-aos="fade-right" data-aos-delay="200">
        <h1 class="text-white md:text-left uppercase mb-12 text-center">
            <span class="text-6xl md:text-7xl font-bold tracking-widest block">Himatif</span>
            <span class="text-2xl md:text-3xl tracking-wider font-light block">Universitas Bengkulu</span>
        </h1>

        <div class="text-center md:text-left">
            <span class="text-dark-blue-400 text-lg font-bold">
                Wadah bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya dan mengabdi.
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
                Sekilas Tentang Himatif
            </h2>
            <span class="text-dark-blue-400 text-base font-bold leading-relaxed">
                Himpunan Mahasiswa Teknik Informatika (HIMATIF) di bentuk di Bengkulu (Universitas Bengkulu) pada tanggal 22 september 2006 Himatif merupakan tempat bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya serta mengabdi sebagai kewajiban seorang mahasiswa. Kepengurusan HIMATIF di bagi menjadi 6 devisi bidang, yaitu Bidang Kerohanian, Bidang IT, Bidang Pendidikan, Bidang Olahraga dan Kesenian, Bidang Pengabdian Masyarakat, Bidang Kewirausahaan
            </span>
        </div>
    </div>

    <div class="mt-36">
        <h2 class="text-dark-blue-800 text-2xl lg:text-4xl font-bold mb-12 flex justify-center" data-aos="zoom-in-up">
            Bidang Organisasi
        </h2>
        <div class="grid grid-row md:grid-cols-2 lg:grid-cols-3 place-items-center"  data-aos="fade-up" data-aos-delay="500">
            <div class="modal-open border-2 cursor-pointer hover:border-gray-400 transition duration-500 ease-in-out w-64 h-64 lg:w-80 lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/KWU.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/IT.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/PSDM.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/Minbak.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/Pengabdian Masyarakat.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/Kerohanian.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Simple Modal! Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>

            <!--Body-->
            <p>Modal content can go here</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa fugiat totam molestias assumenda ipsum inventore sunt aperiam qui, architecto ad, debitis eius neque repellendus quisquam facere harum dolor omnis facilis.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa fugiat totam molestias assumenda ipsum inventore sunt aperiam qui, architecto ad, debitis eius neque repellendus quisquam facere harum dolor omnis facilis.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa fugiat totam molestias assumenda ipsum inventore sunt aperiam qui, architecto ad, debitis eius neque repellendus quisquam facere harum dolor omnis facilis.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa fugiat totam molestias assumenda ipsum inventore sunt aperiam qui, architecto ad, debitis eius neque repellendus quisquam facere harum dolor omnis facilis.</p>

            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Action</button>
                <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
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