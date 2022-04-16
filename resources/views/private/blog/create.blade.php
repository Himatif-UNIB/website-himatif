@extends('layouts.admin')
@section('title', 'Tambah Posting Baru')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('assets/themes/cork/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/switches.css') }}">

    <style>
        .ck-editor__editable {
            min-height: 500px;
        }

    </style>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <form action="{{ route('admin.blog.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                    <div class="widget-content widget-content-area">
                        <h3>Tambah Posting Baru</h3>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="widget-content widget-content-area br-6">
                        <div class="form-group">
                            <label for="title">Judul:</label>
                            <input type="text" name="title" value="{{ old('title') }}" id="title"
                                class="form-control @error('title') is-invalid @enderror" required="required">

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-8 layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <label for="content-editor">Isi Posting:</label>
                                <textarea name="content" id="content-editor">{{ old('content') }}</textarea>
    
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="widget-content widget-content-area br-6 mt-2">
                                <div class="form-group">
                                    <label for="excerpt">Potongan pendek:</label>
                                    <textarea name="excerpt" id="excerpt" class="form-control" maxlength="255">{{ old('excerpt') }}</textarea>
    
                                    @error('excerpt')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 layout-spacing">
                            <div class="widget-content widget-content-area br-6 mt-2">
                                <div id="iconsAccordion" class="accordion-icons">
                                    <div class="card">
                                        <div class="card-header" id="...">
                                            <section class="mb-0 mt-0">
                                                <div role="menu" class="collapsed" data-toggle="collapse"
                                                    data-target="#iconAccordionTwo" aria-expanded="false"
                                                    aria-controls="iconAccordionTwo">
                                                    <div class="accordion-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-image">
                                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                            <polyline points="21 15 16 10 5 21"></polyline>
                                                        </svg>
                                                    </div>
                                                    Gambar Unggulan
                                                </div>
                                            </section>
                                        </div>
                                        <div id="iconAccordionTwo" class="collapse show" aria-labelledby="..."
                                            data-parent="#iconsAccordion">
                                            <div class="card-body">
    
                                                <div class="custom-file-container form-group" data-upload-id="picture">
                                                    <label>
                                                        Gambar Unggulan
                                                        <span><a href="javascript:void(0)"
                                                                class="custom-file-container__image-clear"
                                                                title="Clear Image">x</a></span>
                                                    </label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="picture"
                                                            class="custom-file-container__custom-file__custom-file-input"
                                                            accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
    
                                                    @error('picture')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="card">
                                        <div class="card-header" id="category-collapse">
                                            <section class="mb-0 mt-0">
                                                <div role="menu" class="collapsed" data-toggle="collapse"
                                                    data-target="#iconAccordionOne" aria-expanded="true"
                                                    aria-controls="iconAccordionOne">
                                                    <div class="accordion-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-list">
                                                            <line x1="8" y1="6" x2="21" y2="6"></line>
                                                            <line x1="8" y1="12" x2="21" y2="12"></line>
                                                            <line x1="8" y1="18" x2="21" y2="18"></line>
                                                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                                        </svg>
                                                    </div>
                                                    Kategori
                                                </div>
                                            </section>
                                        </div>
    
                                        <div id="iconAccordionOne" class="collapse" aria-labelledby="category-collapse"
                                            data-parent="#iconsAccordion">
                                            <div class="card-body">
                                                @forelse ($categories as $item)
                                                    <div class="n-chk">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="categories[]"
                                                                value="{{ $item->id }}"
                                                                {{ in_array($item->id, old('categories', [])) ? 'checked' : '' }}>
                                                            <span class="new-control-indicator"></span> {{ $item->name }}
                                                        </label>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="card">
                                        <div class="card-header" id="...">
                                            <section class="mb-0 mt-0">
                                                <div role="menu" class="" data-toggle="collapse"
                                                    data-target="#iconAccordionThree" aria-expanded="false"
                                                    aria-controls="iconAccordionThree">
                                                    <div class="accordion-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-settings">
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                            <path
                                                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    Pengaturan
                                                </div>
                                            </section>
                                        </div>
                                        <div id="iconAccordionThree" class="collapse" aria-labelledby="..."
                                            data-parent="#iconsAccordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row mb-4">
                                                        <div class="col-2">
                                                            <label class="switch s-icons s-outline s-outline-success mr-2">
                                                                <input type="checkbox" name="allow_comment" value="1"
                                                                    id="allow-comment"
                                                                    @if (getSetting('allowComment') == false) disabled @endif
                                                                    {{ old('allow_comment') == 1 ? 'checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-10">
                                                            <label for="allow-comment">Izinkan komentar pada posting ini</label>
                                                        </div>
    
                                                        @if (getSetting('allowComment') == false)
                                                            <div class="col-12">
                                                                <span class="text-muted">Admin menonaktifkan izin
                                                                    komentar</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label class="switch s-icons s-outline s-outline-info mr-2">
                                                                <input type="checkbox" name="moderate_comment" value="1"
                                                                    id="moderate-comment"
                                                                    @if (getSetting('moderateComment') == true) checked disabled @endif
                                                                    {{ old('moderate_comment') == 1 ? 'checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-10">
                                                            <label for="moderate-comment">Moderasi komentar yang masuk</label>
                                                        </div>
                                                        @if (getSetting('moderateComment') == true)
                                                            <div class="col-12">
                                                                <span class="text-muted">Admin mengaktikan moderasi
                                                                    komentar. Semua komentar yang masuk dimoderasi.</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="card">
                                        <div class="card-header" id="category-collapse">
                                            <section class="mb-0 mt-0">
                                                <div role="menu" class="collapsed" data-toggle="collapse"
                                                    data-target="#iconAccordionPublish" aria-expanded="true"
                                                    aria-controls="iconAccordionOne">
                                                    <div class="accordion-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-send">
                                                            <line x1="22" y1="2" x2="11" y2="13"></line>
                                                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                                        </svg>
                                                    </div>
                                                    Terbitkan
                                                </div>
                                            </section>
                                        </div>
    
                                        <div id="iconAccordionPublish" class="collapse"
                                            aria-labelledby="category-collapse" data-parent="#iconsAccordion">
                                            <div class="card-body">
                                                <div>Terbitkan saat sudah siap, atau simpan sebagai konsep untuk nanti.</div>
                                            </div>
                                            <div class="card-footer">
                                                <input type="submit" value="Simpan Draft" name="draft"
                                                    class="btn btn-secondary btn-md">
                                                <input type="submit" value="Terbitkan"
                                                    class="btn btn-primary btn-md float-right" name="publish">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/ckeditor/build/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#content-editor'), {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'alignment',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'indent',
                        'outdent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                    ]
                },
                language: 'id',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side',
                        'linkImage'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
                licenseKey: '',

            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: 2egv00ycclqa-8o65j7c6blw0');
                console.error(error);
            });

        var pictureUpload = new FileUploadWithPreview('picture')
    </script>
@endpush
