<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png" sizes="16x16">

    <title>Himatif</title>
</head>
<body>

    <div class="bg-dark-blue relative">
        <div class="container mx-auto px-6 lg:px-28 py-6 overflow-hidden lg:overflow-visible">

            <!-- START NAVBAR -->
            <div class="flex justify-between items-center">
                <img class="" src="{{ asset('assets/brand-logo.png') }}" alt="">
                <div class="text-dark-blue-400 invisible lg:visible">
                    <ul class="flex items-center">
                        <li class="px-6 hover:text-gray-50">
                            <a href="">Beranda</a>
                        </li>
                        <li class="px-6 hover:text-gray-50">
                            <a href="">Struktur</a>
                        </li>
                        <li class="px-6 hover:text-gray-50">
                            <a href="">Blog</a>
                        </li>
                        <button class="border-2 rounded-xl px-5 py-1 border-dark-blue-200 focus:outline-none hover:bg-orange-600 hover:text-white hover:border-white">
                            Login
                        </button>
                    </ul>
                </div>
            </div>
            <!-- END NAVBAR -->

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
        </div>
    </div>

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
                <div class="border-2 cursor-pointer hover:border-gray-400 transition duration-500 ease-in-out w-64 h-64 lg:w-80 lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
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

     <!-- START FOOTER -->
     <div class="mt-64 py-24 bg-dark-blue border-t-8 border-dark-blue-200 overflow-hidden lg:overflow-visible">
         <div class="container mx-auto">
             <div class="flex items-center justify-center">
                 <img src="{{ asset('assets/himatif-white.png') }}" alt="">
                 <span class="text-white text-4xl font-serif ml-3">
                    Himatif.Unib
                 </span>
             </div>
             <span class="flex justify-center mt-8 px-8 lg:px-80 text-center text-dark-blue-400 font-semibold">
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus inventore suscipit quaerat quam harum sapiente perferendis molestiae tempore non?
             </span>
             <span class="flex justify-center text-bold text-white text-xl uppercase mt-6">
                Follow Us
             </span>
             <div class="mt-6 flex justify-center space-x-3">
                 <img class="w-14 h-14 lg:w-16 lg:h-16" src="{{ asset('assets/media/media-youtube.png') }}" alt="Youtube Himatif">
                 <img class="w-14 h-14 lg:w-16 lg:h-16" src="{{ asset('assets/media/media-instagram.png') }}" alt="Instagram Himatif">
                 <img class="w-14 h-14 lg:w-16 lg:h-16" src="{{ asset('assets/media/media-facebook.png') }}" alt="Facebook Himatif">
             </div>
         </div>
    </div>
    <!-- END FOOTER -->

    <!-- START BOTTOM NAVBAR -->
    <div class="w-full md:hidden">
        <section id="bottom-navigation" class="block fixed inset-x-0 bottom-0 z-10 bg-dark-blue-100 shadow">
            <div id="tabs" class="flex justify-between">
                <a href="#" class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-200">
                    <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                      </svg>
                    <span class="tab tab-home block text-xs">Beranda</span>
                </a>
                <a href="#" class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-400">
                    <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                      </svg>
                    <span class="tab tab-kategori block text-xs">Struktur</span>
                </a>
                <a href="#" class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-400">
                    <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                      </svg>
                    <span class="tab tab-explore block text-xs">Blog</span>
                </a>
                <a href=# class="w-full justify-center inline-block text-center pt-2 pb-1 text-gray-400">
                    <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                      </svg>
                    <span class="tab tab-account block text-xs">Dashboard</span>
                </a>
            </div>
        </section>
    </div>
    <!-- END BOTTOM NAVBAR -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</body>
</html>