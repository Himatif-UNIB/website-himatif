@extends('layouts.admin')
@section('title', 'Tambah Album Baru')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('assets/themes/cork/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/switches.css') }}">

    <style>
        .ck-editor__editable {
            min-height: 200px;
        }

    </style>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <form action="{{ route('admin.gallery.store') }}" method="post" class="dropzone" enctype="multipart/form-data">
            @csrf
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                    <div class="widget-content widget-content-area">
                        <h3>Tambah Album Baru</h3>
                        <p>Buat album baru, berikan judul, deskripsi dan pilih satu atau beberapa kategori.
                            Sebuah album bisa memiliki satu atau berapapun foto didalamnya, tidak ada batasan.
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-sm-12  layout-spacing">
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

                        <div class="form-group">
                            <label for="content-editor">Deskripsi:</label>
                            <textarea name="description" id="content-editor"></textarea>
    
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6 mt-2">
                        <div id="iconsAccordion" class="accordion-icons">
                            <div class="card">
                                <div class="card-header" id="category-collapse">
                                    <section class="mb-0 mt-0">
                                        <div role="menu" class="collapsed" data-toggle="collapse"
                                            data-target="#iconAccordionOne" aria-expanded="true"
                                            aria-controls="iconAccordionOne">
                                            <div class="accordion-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
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

                                <div id="iconAccordionOne" class="collapsed" aria-labelledby="category-collapse"
                                    data-parent="#iconsAccordion">
                                    <div class="card-body">
                                        @forelse ($categories as $item)
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                                                    <input type="checkbox" class="new-control-input" name="categories[]"
                                                        value="{{ $item->id }}">
                                                    <span class="new-control-indicator"></span> {{ $item->name }}
                                                </label>
                                            </div>
                                        @empty

                                        @endforelse
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                                </svg>
                                            </div>
                                            Upload Foto
                                        </div>
                                    </section>
                                </div>

                                <div id="iconAccordionPublish" class="collapse" aria-labelledby="category-collapse"
                                    data-parent="#iconsAccordion">
                                    <div class="card-body">
                                        <div>Pilih foto untuk ditambahkan ke album.</div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <input type="submit" value="Selanjutnya" class="btn btn-primary btn-md" name="publish">
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
    </script>
@endpush
