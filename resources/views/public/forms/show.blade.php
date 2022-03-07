<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title>{{ $form->title }}</title>

    @if (getSiteLogo() == null)
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/favicon.ico') }}" />
    @else
        <link rel="icon" href="{{ getSiteLogo() }}" />
    @endif

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/air-datepicker/dist/css/datepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <!--  END CUSTOM STYLE FILE  -->

    <style>
        input[type=text] {
            border-bottom: 1px solid #92A4B2;
            padding: 2px 0 2px 0;
        }

        textarea {
            border-bottom: 1px solid #92A4B2;
        }

    </style>

    @if (getSetting('googleAnalyticsId'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ getSetting('googleAnalyticsId') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ getSetting('googleAnalyticsId') }}');
        </script>
    @endif
</head>

<body class="bg-dark-blue">

    <div class="my-36 max-w-3xl mx-auto space-y-4">
        @if (session()->has('success'))
            @include('public.forms.success')
        @else
            <div class="w-full h-auto px-6 py-5 bg-gray-100 rounded-md border-t-8 border-orange-500">
                <h2 class="text-3xl font-semibold text-dark-blue-800">{{ $form->title }}</h2>
                <p class="my-3 text-dark-blue-800">{!! $form->description !!}</p>
            </div>

            <form action="{{ route('form.store', $form->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="form_id" value="{{ $form->id }}">

                @forelse ($form->questions as $item)
                    @if ($item->type == 1)
                        {{-- Input text --}}
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md">
                            <h3 class="text-lg font-semibold text-dark-blue-800">
                                <label for="question-{{ $item->id }}">
                                    {{ $item->question }}
                                    @if ($item->is_required == 1)
                                        <span class="font-weight-bold text-danger">*</span>
                                    @endif
                                </label>
                            </h3>
                            <input
                                class="my-3 w-full bg-gray-100 focus:outline-none focus:border focus:border-b-2 focus:border-orange-600"
                                type="text" value="{{ old('question.' . $item->id) }}"
                                id="question-{{ $item->id }}" placeholder="Jawaban anda"
                                name="question[{{ $item->id }}]"
                                @if ($item->is_required == 1) required="required" @endif>

                            @error('question.' . $item->id)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if ($item->type == 2)
                        {{-- Textarea --}}
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md mt-4">
                            <h3 class="text-lg font-semibold text-dark-blue-800">
                                <label for="question-{{ $item->id }}">
                                    {{ $item->question }}
                                    @if ($item->is_required == 1)
                                        <span class="font-weight-bold text-danger">*</span>
                                    @endif
                                </label>
                            </h3>
                            <textarea
                                class="my-3 w-full bg-gray-100 focus:outline-none focus:border focus:border-b-2 focus:border-orange-600"
                                type="text" id="question-{{ $item->id }}" placeholder="Jawaban anda"
                                name="question[{{ $item->id }}]"
                                @if ($item->is_required == 1) required="required" @endif>{{ old('question.' . $item->id) }}</textarea>

                            @error('question.' . $item->id)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if ($item->type == 3)
                        {{-- Input radio --}}
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md mt-4">
                            <h3 class="text-lg font-semibold text-dark-blue-800">{{ $item->question }}</h3>
                            <div class="mt-4">
                                <div class="mt-2">
                                    @foreach (json_decode($item->multiple_options) as $key => $option)
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-info">
                                                <input type="radio" class="new-control-input"
                                                    name="question[{{ $item->id }}]" value="{{ $option }}">
                                                <span class="new-control-indicator"></span> {{ $option }}
                                            </label>
                                        </div>
                                    @endforeach

                                    @error('question.' . $item->id)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($item->type == 4)
                        {{-- input checkbox --}}
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md mt-4">
                            <h3 class="text-lg font-semibold text-dark-blue-800">{{ $item->question }}</h3>
                            <div class="mt-4 space-x-3">

                                @foreach (json_decode($item->multiple_options) as $key => $option)
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-info">
                                            <input type="checkbox" class="new-control-input"
                                                name="question[{{ $item->id }}]" value="{{ $option }}">
                                            <span class="new-control-indicator"></span> {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($item->type == 5)
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md mt-4">
                            <h3 class="text-lg font-semibold text-dark-blue-800">Pertanyaan Tanpa Judul</h3>
                            <div class="mt-4">
                                <select name="question[{{ $item->id }}]" id="question-{{ $item->id }}"
                                    class="w-1/4 px-3 py-2 bg-gray-100 border border-dark-blue-400 rounded-md">
                                    @forelse (json_decode($item->multiple_options) as $option)
                                        <option value="{{ $option }}">{{ $option }} </option>
                                    @empty
                                        <option value="0">Tidak ada pilihan</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    @endif

                    @if ($item->type == 6)
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md mt-4">
                            <h3 class="text-lg font-semibold text-dark-blue-800">
                                <label for="question-{{ $item->id }}">
                                    {{ $item->question }}
                                    @if ($item->is_required == 1)
                                        <span class="font-weight-bold text-danger">*</span>
                                    @endif
                                </label>
                            </h3>
                            <input class="my-3 w-full bg-gray-100 focus:outline-none" type="text"
                                value="{{ old('question.' . $item->id) }}" placeholder="Jawaban anda"
                                name="question[{{ $item->id }}]" value="{{ old('question.' . $item->id) }}"
                                id="question-{{ $item->id }}"
                                @if ($item->is_required == 1) required="required" @endif>

                            @error('question.' . $item->id)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if ($item->type == 7)
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md mt-4">
                            <h3 class="text-lg font-semibold text-dark-blue-800">
                                <label for="question-{{ $item->id }}">
                                    {{ $item->question }}
                                    @if ($item->is_required == 1)
                                        <span class="font-weight-bold text-danger">*</span>
                                    @endif
                                </label>
                            </h3>
                            <input
                                class="my-3 w-full bg-gray-100 focus:outline-none focus:border focus:border-b-2 focus:border-orange-600"
                                type="text" value="{{ old('question.' . $item->id) }}"
                                id="question-{{ $item->id }}" placeholder="Jawaban anda"
                                name="question[{{ $item->id }}]"
                                @if ($item->is_required == 1) required="required" @endif>

                            @error('question.' . $item->id)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if ($item->type == 8)
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md mt-4">
                            <h3 class="text-lg font-semibold text-dark-blue-800">
                                <label for="question-{{ $item->id }}">
                                    {{ $item->question }}
                                    @if ($item->is_required == 1)
                                        <span class="font-weight-bold text-danger">*</span>
                                    @endif
                                </label>
                            </h3>
                            <input
                                class="my-3 w-full bg-gray-100 focus:outline-none focus:border focus:border-b-2 focus:border-orange-600"
                                type="text" value="{{ old('question.' . $item->id) }}"
                                id="question-{{ $item->id }}" placeholder="Jawaban anda"
                                name="question[{{ $item->id }}]"
                                @if ($item->is_required == 1) required="required" @endif>

                            @error('question.' . $item->id)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if ($item->type == 9)
                        <div class="w-full mb-2 h-auto px-6 py-5 bg-gray-100 rounded-md mt-4">
                            <h3 class="text-lg font-semibold text-dark-blue-800">
                                <label for="question-{{ $item->id }}">
                                    {{ $item->question }}
                                    @if ($item->is_required == 1)
                                        <span class="font-weight-bold text-danger">*</span>
                                    @endif
                                </label>
                            </h3>
                            <input
                                class="my-3 w-full bg-gray-100 focus:outline-none focus:border focus:border-b-2 focus:border-orange-600"
                                type="file" value="{{ old('question.' . $item->id) }}"
                                id="question-{{ $item->id }}"
                                accept="{{ implode(',', json_decode($item->file_rules)->mimes) }}"
                                name="question[{{ $item->id }}]"
                                @if ($item->is_required == 1) required="required" @endif>

                            @error('question.' . $item->id)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                    @empty
                    @endforelse

                    <div class="flex justify-center mt-4">
                        <input type="submit"
                            class="font-semibold text-lg bg-orange-600 rounded-md px-6 py-2 text-white focus:outline-none cursor-pointer"
                            value="Kirim Jawaban" />
                    </div>
                </form>
            @endif
        </div>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <script src="{{ asset('assets/themes/cork/js/libs/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/themes/cork/js/custom.js') }}"></script>
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('assets/plugins/air-datepicker/dist/js/datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/air-datepicker/dist/js/i18n/datepicker.id.js') }}"></script>
        <script src="{{ asset('assets/plugins/moment.js/moment.js') }}"></script>
        <script
                src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
        </script>

        <script>
            @foreach ($dateFields as $item)
                $('#question-{{ $item->id }}').datepicker({
                language: 'id',
                position: 'top left',
                dateFormat: 'yyyy-mm-dd',
                closeButton: true,
                onShow: function(dp, animationCompleted) {
                if (!animationCompleted) {
                if (dp.$datepicker.find('button').html() === undefined) {
                /*ONLY when button don't existis*/
                dp.$datepicker.append(
                '<button type="button"
                    class="bg-orange-600 p-2 text-white w-full hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50"
                    disabled="disabled"><i class="fas fa-check"></i> OK</button>'
                );
                dp.$datepicker.find('button').click(function(event) {
                dp.hide();
                });
                }
                }
                },
                onSelect: function(formattedDate, date, dp) {
                if (formattedDate.length > 0) {
                dp.$datepicker.find('button').prop('disabled', false).removeClass('uk-button-default')
                .addClass('uk-button-primary');
                } else {
                dp.$datepicker.find('button').prop('disabled', true).removeClass('uk-button-primary')
                .addClass('uk-button-default');
                }
                }
                });
            @endforeach

            @foreach ($timeFields as $item)
                $('#question-{{ $item->id }}').bootstrapMaterialDatePicker({
                date: false,
                shortTime: false,
                format: 'HH:mm',
                nowButton: true,
                nowText: 'Sekarang',
                okText: 'Selanjutnya',
                cancelText: 'Batal'
                });
            @endforeach

            @foreach ($dateTimeFields as $item)
                $('#question-{{ $item->id }}').datepicker({
                language: 'id',
                position: 'top left',
                timepicker: true,
                dateFormat: 'yyyy-mm-dd',
                timeFormat: 'hh:ii',
                onShow: function(dp, animationCompleted) {
                if (!animationCompleted) {
                if (dp.$datepicker.find('button').html() === undefined) {
                /*ONLY when button don't existis*/
                dp.$datepicker.append(
                '<button type="button"
                    class="bg-orange-600 p-2 text-white w-full hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50"
                    disabled="disabled"><i class="fas fa-check"></i> OK</button>'
                );
                dp.$datepicker.find('button').click(function(event) {
                dp.hide();
                });
                }
                }
                },
                onSelect: function(formattedDate, date, dp) {
                if (formattedDate.length > 0) {
                dp.$datepicker.find('button').prop('disabled', false).removeClass('uk-button-default')
                .addClass('uk-button-primary');
                } else {
                dp.$datepicker.find('button').prop('disabled', true).removeClass('uk-button-primary')
                .addClass('uk-button-default');
                }
                }
                });
            @endforeach
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

    </html>
