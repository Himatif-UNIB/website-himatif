@extends('layouts.admin')
@section('title', $gallery->title)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('assets/themes/cork/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/switches.css') }}">
    <link href="{{ asset('assets/plugins/toastify-js/src/toastify.css') }}" rel="stylesheet">
    <link href="https://releases.transloadit.com/uppy/v1.25.2/uppy.min.css" rel="stylesheet">

    <style>
        .ck-editor__editable {
            min-height: 200px;
        }

    </style>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>{{ $gallery->title }}</h3>
                </div>
            </div>


            <div class="col-xl-4 col-lg-4 col-sm-12  layout-spacing">
                <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="widget-content widget-content-area br-6">
                        <div class="form-group">
                            <label for="title">Judul:</label>
                            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" id="title"
                                class="form-control @error('title') is-invalid @enderror" required="required">

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content-editor">Deskripsi:</label>
                            <textarea name="description"
                                id="content-editor">{{ old('description', $gallery->description) }}</textarea>

                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

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
                                                        value="{{ $item->id }}" @if (in_array($item->id, $galleryCategories)) checked @endif>
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
                                            Terbitkan
                                        </div>
                                    </section>
                                </div>

                                <div id="iconAccordionPublish" class="collapse" aria-labelledby="category-collapse"
                                    data-parent="#iconsAccordion">
                                    <div class="card-body">
                                        <div>Terbitkan saat sudah siap, atau simpan sebagai konsep untuk nanti.</div>
                                    </div>
                                    <div class="card-footer">
                                        @if ($gallery->status == 'draft')
                                            <input type="submit" value="Simpan Draft" name="draft" class="btn btn-secondary btn-md">
                                            <input type="submit" value="Terbitkan" class="btn btn-primary btn-md float-right" name="publish">
                                        @else
                                            <input type="submit" value="Simpan" name="publish" class="btn btn-primary btn-md">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 mt-2">
                    <div class="alert alert-info">
                        Pilih dan unggah berapapun foto untuk album ini. Setiap foto dibatasi maksimal 5MB,
                        dan hanya bisa mengunggah 15 foto bersamaan dalam satu waktu. Jadi jika kamu punya 30 foto, kamu perlu
                        mengunggahnya 2 kali.
                    </div>

                    <div class="alert alert-success">Klik <i>icon</i> pensil disetiap foto untuk mengubah judul juga deskripsinya.</div>
                    <div id="items-uploader" style="width: 100%"></div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/ckeditor/build/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastify-js/src/toastify.js') }}"></script>
    <script src="https://releases.transloadit.com/uppy/v1.25.2/uppy.min.js"></script>
    <script src="https://releases.transloadit.com/uppy/locales/v1.17.1/id_ID.min.js"></script>

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

    <script>
        const Dashboard = Uppy.Dashboard;
        const XHRUpload = Uppy.XHRUpload;
        const Url = Uppy.Url;

        function preload() {
            @if (count($gallery->media) > 0)
            @foreach ($gallery->media as $item)
            fetch('{{ $item->getFullUrl() }}')
                .then((response) => response.blob())
                .then((blob) => {
                    uppy.addFile({
                        name: '{{ $item->name }}',
                        type: blob.type,
                        data: blob,
                        remote: true,
                        meta: {
                            fileIndex: {{ $item->id }}
                        }
                    });

                    Object.keys(uppy.state.files).forEach(file => {
                        uppy.setFileState(file, { 
                            progress: {
                                uploadComplete: true,
                                uploadStarted: true
                            } 
                        })
                    })
                })
            @endforeach
        @endif
        }

        preload();

        var uppy = Uppy.Core({
            meta: {
                '_method': 'PUT',
                '_token': CSRF_TOKEN
            },
            debug: true,
            locale: Uppy.locales.id_ID,
            restrictions: {
                maxFileSize: 10096000,
                minFileSize: null,
                maxTotalFileSize: null,
                maxNumberOfFiles: null,
                minNumberOfFiles: null,
                allowedFileTypes: ['image/jpg', 'image/png', 'image/jpeg', 'image/webp']
            },
        });

        uppy.use(XHRUpload, {
            endpoint: '{{ route('api.gallery.gallery.update', $gallery->id) }}',
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${passportAccessToken}`
            },
            fieldName: 'picture'
        });

        uppy.use(Dashboard, {
            id: 'Dashboard',
            target: '#items-uploader',
            metaFields: [],
            inline: true,
            width: 750,
            height: 550,
            thumbnailWidth: 280,
            defaultTabIcon: false,
            showLinkToFileUploadResult: true,
            showProgressDetails: true,
            hideUploadButton: false,
            hideRetryButton: false,
            hidePauseResumeButton: false,
            hideCancelButton: true,
            hideProgressAfterFinish: false,
            note: null,
            doneButtonHandler: null,
            closeModalOnClickOutside: false,
            closeAfterFinish: false,
            disableStatusBar: false,
            disableInformer: false,
            disableThumbnailGenerator: false,
            disablePageScrollWhenModalOpen: true,
            animateOpenClose: true,
            fileManagerSelectionType: 'files',
            proudlyDisplayPoweredByUppy: false,
            onRequestCloseModal: false,
            showSelectedFiles: true,
            showRemoveButtonAfterComplete: true,
            browserBackButtonClose: false,
            theme: 'light',
            autoOpenFileEditor: true,
            limit: 15,
            metaFields: [
                { id: 'title', name: 'Judul foto', placeholder: 'Judul foto ini' },
                { id: 'description', name: 'Deskripsi', placeholder: 'Deskripsi foto ini' }
            ]
        });

        uppy.getPlugin('Dashboard').setOptions({
            width: '100%',
        });

        uppy.on('complete', (result) => {
            console.log(result);

            if (result.failed.length != 0) {
                result.failed.forEach((error) => {
                    let fileName = error.data.name;

                    Toastify({
                        text: `Gagal mengunggah ${fileName}`,
                        gravity: "top",
                        position: 'right',
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        duration: 10000
                    }).showToast();
                })
            }

            if (result.successful.length != 0) {
                result.successful.forEach((success) => {
                    let fileName = success.data.name;

                    Toastify({
                        text: `Berhasil mengunggah file ${fileName}`,
                        duration: 5000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
                    }).showToast();
                })
            }
        });

        uppy.on('file-removed', (file, reason) => {
            let index = file.meta.fileIndex;
            let fileName = file.name;

            fetch(`{{ route('api.gallery.gallery.destroy', $gallery->id) }}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    fileId: index
                })
            })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        Toastify({
                            text: `${res.message}: ${fileName}`,
                            duration: 5000,
                            close: true,
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
                        }).showToast();
                    }
                })
                .catch(errors => {
                    Toastify({
                        text: errors,
                        gravity: "top",
                        position: 'right',
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        duration: 10000
                    }).showToast();
                });
        })

    </script>
@endpush
