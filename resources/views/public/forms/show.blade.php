<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title>{{ $form->title }}</title>

    @if (getSiteLogo() == NULL)
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/favicon.ico') }}"/>
    @else
        <link rel="icon" href="{{ getSiteLogo() }}"/>
    @endif

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('assets/themes/cork/css/pages/contact_us.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/air-datepicker/dist/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body class="sidebar-noneoverflow">

    <div class="contact-us">
        <div class="cu-contact-section">                           
            <div class="cu-section-header">
                <h4>{{ $form->title }}</h4>
                @if ($form->description != '')
                    <p>{{ $form->description }}</p>
                @endif
            </div>
            <div id="basic_map1"></div>
            <div class="contact-form">
                @if (session()->has('success'))
                    <form action="">
                        @if (session()->get('success') == '')
                        <p>Tanggapan anda telah dikirimkan. Terima kasih!</p>
                    @else
                        <p>{{ session()->get('success') }}</p>
                    @endif
                    </form>
                @else
                <form class="" action="{{ route('form.store', $form->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="form_id" value="{{ $form->id }}">

                    <h4>Berikan sebuah tanggapan</h4>

                    @forelse ($form->questions as $item)
                        @if ($item->type == 1)
                        <div class="row mb-4">
                            <div class="col-sm-12 col-12 input-fields mb-4 mb-sm-0">
                                <label for="question-{{ $item->id }}">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</label>
                                <input type="text" value="{{ old('question.'. $item->id) }}" id="question-{{ $item->id }}" class="form-control @error('question.'. $item->id) is-invalid @enderror" name="question[{{ $item->id }}]" @if ($item->is_required == 1) required="required" @endif>
                            
                                @error('question.'. $item->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        @if ($item->type == 2)
                        <div class="row">
                            <div class="col">
                                <div class="form-group input-fields">
                                    <label for="question-{{ $item->id }}">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</label>
                                    <textarea class="form-control @error('question.'. $item->id) is-invalid @enderror" id="question-{{ $item->id }}" name="question[{{ $item->id }}]" rows="4" @if ($item->is_required == 1) required="required" @endif>{{ old('question.'. $item->id) }}</textarea>
                                
                                    @error('question.'. $item->id)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($item->type == 3)
                        <div class="row mb-4">
                            <div class="col-sm-12 col-12">
                                <p class="">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</p>
                            </div>
                            <div class="col-sm-12 col-12 input-fields">
                                @foreach (json_decode($item->multiple_options) as $key => $option)
                                <div class="n-chk">
                                    <label class="new-control new-radio radio-success">
                                      <input type="radio" class="new-control-input @error('question.'. $item->id) is-invalid @enderror" name="question[{{ $item->id }}]" value="{{ $option }}" @if ($item->is_required == 1) required="required" @endif>
                                      <span class="new-control-indicator"></span> {{ $option }}
                                    </label>
                                </div>
                                @endforeach

                                @error('question.'. $item->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        @if ($item->type == 4)
                        <div class="row mb-4">
                            <div class="col-sm-12 col-12">
                                <p class="">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</p>
                            </div>
                            <div class="col-sm-12 col-12 input-fields">
                                @foreach (json_decode($item->multiple_options) as $key => $option)
                                <div class="n-chk" style="display: block">
                                    <label class="new-control new-checkbox checkbox-success">
                                      <input type="checkbox" class="new-control-input @error('question.'. $item->id) is-invalid @enderror" name="question[{{ $item->id }}]" value="{{ $option }}" @if ($item->is_required == 1) required="required" @endif>
                                      <span class="new-control-indicator"></span> {{ $option }}
                                    </label>
                                </div>
                                @endforeach

                                @error('question.'. $item->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        @if ($item->type == 5)
                        <div class="row">
                            <div class="col">
                                <div class="form-group input-fields">
                                    <label for="question-{{ $item->id }}">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</label>
                                    <select name="question[{{ $item->id }}]" id="question-{{ $item->id }}" class="form-control @error('question.'. $item->id) is-invalid @enderror" @if ($item->is_required == 1) required="required" @endif>
                                        @forelse (json_decode($item->multiple_options) as $option)
                                            <option value="{{ $option }}">{{ $option }} </option>
                                        @empty
                                            <option value="0">Tidak ada pilihan</option>
                                        @endforelse
                                    </select>

                                    @error('question.'. $item->id)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($item->type == 6)
                        <div class="row mb-4">
                            <div class="col-sm-12 col-12 input-fields mb-4 mb-sm-0">
                                <label for="question-{{ $item->id }}">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</label>
                                <input type="text" name="question[{{ $item->id }}]" value="{{ old('question.'. $item->id) }}" id="question-{{ $item->id }}" class="form-control @error('question.'. $item->id) is-invalid @enderror" @if ($item->is_required == 1) required="required" @endif>
                            
                                @error('question.'. $item->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        @if ($item->type == 7)
                        <div class="row mb-4">
                            <div class="col-sm-12 col-12 input-fields mb-4 mb-sm-0">
                                <label for="question-{{ $item->id }}">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</label>
                                <input type="text"  name="question[{{ $item->id }}]"value="{{ old('question.'. $item->id) }}" id="question-{{ $item->id }}" class="form-control @error('question.'. $item->id) is-invalid @enderror" @if ($item->is_required == 1) required="required" @endif>
                            
                                @error('question.'. $item->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        @if ($item->type == 8)
                        <div class="row mb-4">
                            <div class="col-sm-12 col-12 input-fields mb-4 mb-sm-0">
                                <label for="question-{{ $item->id }}">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</label>
                                <input type="text" name="question[{{ $item->id }}]" value="{{ old('question.'. $item->id) }}" id="question-{{ $item->id }}" class="form-control @error('question.'. $item->id) is-invalid @enderror" @if ($item->is_required == 1) required="required" @endif>
                            
                                @error('question.'. $item->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        @if ($item->type == 9)
                        <div class="row mb-4">
                            <div class="col-sm-12 col-12 input-fields mb-4 mb-sm-0">
                                <label for="question-{{ $item->id }}">{{ $item->question }} @if ($item->is_required == 1) <span class="font-weight-bold text-danger">*</span> @endif</label>
                                <input type="file" name="question[{{ $item->id }}]" accept="{{ implode(',', json_decode($item->file_rules)->mimes) }}" id="question-{{ $item->id }}" class="form-control @error('question.'. $item->id) is-invalid @enderror" @if ($item->is_required == 1) required="required" @endif>
                            
                                @error('question.'. $item->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif
                    @empty
                        
                    @endforelse
                    
                    <div class="row">
                        <div class="col text-sm-left text-center">
                            <button class="btn btn-primary mt-4">Kirim Tanggapan</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="{{ asset('assets/themes/cork/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/themes/cork/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/plugins/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/air-datepicker/dist/js/i18n/datepicker.id.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment.js/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <script>
        function getHeight() {
            var getMapElement = document.getElementById('basic_map1');
            var getWindowHeight = window.innerHeight;
            var setHeightOfMap = getMapElement.style.height = getWindowHeight + 'px';
        }
        getHeight();

        window.addEventListener('resize', function(event){
          getHeight();
        });

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
                            '<button type="button" class="btn btn-block btn-primary uk-button uk-button-default uk-button-small uk-width-1-1 uk-margin-small-bottom" disabled="disabled"><i class="fas fa-check"></i> OK</button>'
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
                            '<button type="button" class="btn btn-block btn-primary uk-button uk-button-default uk-button-small uk-width-1-1 uk-margin-small-bottom" disabled="disabled"><i class="fas fa-check"></i> OK</button>'
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