@extends('layouts.frontend')

@section('inner-content')
    <!-- START ABOUT US -->
    <div class="mt-16">
        <div class="flex justify-center">
            <span class="text-white text-4xl font-bold mb-4">
                Struktur Kepengurusan {{ getSetting('organizationName') }} {{ getActivePeriod()->name }}
            </span>
        </div>
    </div>


    @forelse ($positions as $index => $item)
        @php ($grid = (count($positions[$index]) > 3) ? 4 : count($positions[$index]))

        <div class="grid grid-row md:grid-cols-2 lg:grid-cols-{{ $grid }} place-items-center">
            @foreach ($positions[$index] as $data)
                @if ($data['position']->parent_id == null)
                <div
                    class="w-80 h-80 bg-card-color rounded-xl border-2 cursor-pointer hover:border-gray-400 transition duration-500 ease-in-out w-64 h-64 lg:w-80 lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                    <div class="flex justify-center h-full items-center">
                        <div class="w-64 h-64">
                            <div class="flex justify-center">
                                @isset ($data['user']->media[0])
                                    <img src="{{ $data['user']->media[0]->getFUllUrl() }}" alt="">
                                @else
                                    <img class="w-44 h-44 rounded-full object-cover" src="{{ getSiteLogo() }}" alt="">
                                @endisset
                            </div>
                            
                            <div class="flex justify-between items-center mt-5">
                                <div>
                                    <span class="flex font-semibold text-gray-200 text-lg">{{ $data['user']->name }}</span>
                                    <span class="flex font-semibold text-orange-500 text-sm">{{ $data['position']->name }}</span>
                                </div>
                                @if (isset($childs[$data['position']->id]) && count($childs[$data['position']->id]) > 0)
                                <div class="flex space-x-3">
                                    <i class="fa fa-users" style="color: white"></i>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @empty
        <div class="grid grid-row md:grid-cols-2 lg:grid-cols-3 place-items-center">
            <div
                class="w-80 h-80 bg-card-color rounded-xl border-2 cursor-pointer hover:border-gray-400 transition duration-500 ease-in-out w-64 h-64 lg:w-80 lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <div class="flex justify-center h-full items-center">
                    <div class="w-64 h-64">
                        <div class="flex justify-center">
                            <img class="w-44 h-44 rounded-full object-cover" src="{{ getSiteLogo() }}" alt="">
                        </div>
                        <div class="flex justify-between items-center mt-5">
                            <div>
                                <span class="flex font-semibold text-gray-200 text-lg">Hmm...</span>
                                <span class="flex font-semibold text-orange-500 text-sm">Tidak ada data pengurus</span>
                            </div>
                            <div class="flex space-x-3">
                                <span>
                                    <svg class="fill-current text-gray-400" height="1.5rem" viewBox="0 0 512 512" width="1.5rem"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m305 256c0 27.0625-21.9375 49-49 49s-49-21.9375-49-49 21.9375-49 49-49 49 21.9375 49 49zm0 0" />
                                        <path
                                            d="m370.59375 169.304688c-2.355469-6.382813-6.113281-12.160157-10.996094-16.902344-4.742187-4.882813-10.515625-8.640625-16.902344-10.996094-5.179687-2.011719-12.960937-4.40625-27.292968-5.058594-15.503906-.707031-20.152344-.859375-59.402344-.859375-39.253906 0-43.902344.148438-59.402344.855469-14.332031.65625-22.117187 3.050781-27.292968 5.0625-6.386719 2.355469-12.164063 6.113281-16.902344 10.996094-4.882813 4.742187-8.640625 10.515625-11 16.902344-2.011719 5.179687-4.40625 12.964843-5.058594 27.296874-.707031 15.5-.859375 20.148438-.859375 59.402344 0 39.25.152344 43.898438.859375 59.402344.652344 14.332031 3.046875 22.113281 5.058594 27.292969 2.359375 6.386719 6.113281 12.160156 10.996094 16.902343 4.742187 4.882813 10.515624 8.640626 16.902343 10.996094 5.179688 2.015625 12.964844 4.410156 27.296875 5.0625 15.5.707032 20.144532.855469 59.398438.855469 39.257812 0 43.90625-.148437 59.402344-.855469 14.332031-.652344 22.117187-3.046875 27.296874-5.0625 12.820313-4.945312 22.953126-15.078125 27.898438-27.898437 2.011719-5.179688 4.40625-12.960938 5.0625-27.292969.707031-15.503906.855469-20.152344.855469-59.402344 0-39.253906-.148438-43.902344-.855469-59.402344-.652344-14.332031-3.046875-22.117187-5.0625-27.296874zm-114.59375 162.179687c-41.691406 0-75.488281-33.792969-75.488281-75.484375s33.796875-75.484375 75.488281-75.484375c41.6875 0 75.484375 33.792969 75.484375 75.484375s-33.796875 75.484375-75.484375 75.484375zm78.46875-136.3125c-9.742188 0-17.640625-7.898437-17.640625-17.640625s7.898437-17.640625 17.640625-17.640625 17.640625 7.898437 17.640625 17.640625c-.003906 9.742188-7.898437 17.640625-17.640625 17.640625zm0 0" />
                                        <path
                                            d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm146.113281 316.605469c-.710937 15.648437-3.199219 26.332031-6.832031 35.683593-7.636719 19.746094-23.246094 35.355469-42.992188 42.992188-9.347656 3.632812-20.035156 6.117188-35.679687 6.832031-15.675781.714844-20.683594.886719-60.605469.886719-39.925781 0-44.929687-.171875-60.609375-.886719-15.644531-.714843-26.332031-3.199219-35.679687-6.832031-9.8125-3.691406-18.695313-9.476562-26.039063-16.957031-7.476562-7.339844-13.261719-16.226563-16.953125-26.035157-3.632812-9.347656-6.121094-20.035156-6.832031-35.679687-.722656-15.679687-.890625-20.6875-.890625-60.609375s.167969-44.929688.886719-60.605469c.710937-15.648437 3.195312-26.332031 6.828125-35.683593 3.691406-9.808594 9.480468-18.695313 16.960937-26.035157 7.339844-7.480469 16.226563-13.265625 26.035157-16.957031 9.351562-3.632812 20.035156-6.117188 35.683593-6.832031 15.675781-.714844 20.683594-.886719 60.605469-.886719s44.929688.171875 60.605469.890625c15.648437.710937 26.332031 3.195313 35.683593 6.824219 9.808594 3.691406 18.695313 9.480468 26.039063 16.960937 7.476563 7.34375 13.265625 16.226563 16.953125 26.035157 3.636719 9.351562 6.121094 20.035156 6.835938 35.683593.714843 15.675781.882812 20.683594.882812 60.605469s-.167969 44.929688-.886719 60.605469zm0 0" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforelse

    <!-- END ABOUT US -->
@endsection
