@extends('layouts.admin')
@section('title', 'Edit Karya: ' . $showcase->title)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="https://releases.transloadit.com/uppy/v1.25.2/uppy.min.css" rel="stylesheet">

    <style>
        .ck-editor__editable {
            min-height: 200px;
        }

    </style>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <form action="{{ route('admin.showcases.update', $showcase->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                    <div class="widget-content widget-content-area">
                        <h3>Edit Karya</h3>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="widget-content widget-content-area br-6">
                                <div class="form-group mb-3">
                                    <label for="title">Judul Karya:</label>
                                    <input type="text" name="title" value="{{ old('title', $showcase->title) }}"
                                        id="title" class="form-control @error('title') is-invalid @enderror"
                                        required="required">

                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi:</label>
                                    <textarea name="description" id="content-editor">{{ old('description', $showcase->description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="tags">Tag:</label>
                                    <input type="text" name="tags" value="{{ old('tags', $showcase->tags) }}" id="tags"
                                        class="form-control @error('tags') is-invalid @enderror">

                                    @error('tags')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <small class="text-muted">Tuliskan sesuatu yang menjadi penanda karya ini, misalnya:
                                        <b>web,
                                            sistem informasi, tubes pie, tubes pemrograman</b> dan sebagainya</small>
                                </div>

                                <div class="form-group">
                                    <label for="tech">Teknologi:</label>
                                    <input type="text" name="technologies" value="{{ old('technologies', $showcase->technologies) }}"
                                        id="tech" class="form-control @error('technologies') is-invalid @enderror">

                                    @error('technologies')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <small class="text-muted">Tulis teknologi apa saja yang digunakan, misalnya:
                                        <b>Laravel,
                                            MySQL, Pusher, Java, Netbeans</b> dan sebagainya</small>
                                </div>

                                <div class="form-group">
                                    <label>Screenshot</label>
                                    <div>
                                        <small class="text-muted">Pilih maksimal 15 foto terkait karya ini. Foto pertama
                                            akan dijadikan thumbnail.</small>
                                    </div>

                                    <div id="items-uploader" class="mb-3"></div>
                                    <div class="alert alert-success">Klik <i>icon</i> pensil disetiap foto untuk mengubah
                                        judul dan deskripsinya.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title">Kategori</h5>
                                </div>
                                <div class="card-body">
                                    <select name="category_id" id="category" class="form-control" required="required">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id', $showcase->category_id) == $category->id) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if ($showcase->type == 'multimedia')
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title">Video</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="video">URL Video:</label>
                                            <input type="url" name="youtube_url"
                                                value="{{ old('youtube_url', $showcase->youtube_url) }}" id="video"
                                                class="form-control @error('youtube_url') is-invalid @enderror">

                                            @error('youtube_url')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <small class="text-muted">Jika ada, masukkan link <b>YouTube</b>
                                                video</small>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($showcase->type == 'app')
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title">Repository</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="github_url">Link GitHub:</label>
                                            <input type="url" name="github_url"
                                                value="{{ old('github_url', $showcase->github_url) }}" id="github_url"
                                                class="form-control @error('github_url') is-invalid @enderror">

                                            @error('github_url')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <small class="text-muted">Upload <i>source code</i> ke GitHub atau GitLab,
                                                masukkan URLnya disini.</small>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title">Laporan & File Lainnya</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="file">Laporan:</label>
                                        <input type="file" name="file" id="file"
                                            class="form-control @error('file') is-invalid @enderror">

                                        @error('file')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        @if (!is_null($showcase->report_drive_id))
                                            <div class="alert alert-info mt-2">
                                                File laporan: <br>
                                                <i class="fas fa-external-link-alt"></i> <a href="{{ create_drive_url($showcase->report_drive_id) }}"
                                                    target="_blank">{{ $showcase->report_file_name }}</a>
                                            </div>
                                        @endif

                                        <small class="text-muted"><span
                                                class="text-danger font-weight-bold">(opsional)</span> Jika ada dan
                                            bersedia,
                                            upload file laporan untuk karya ini. Dapat berupa file PDF atau DOCX.</small>
                                        @if (!is_null($showcase->report_drive_id))
                                        <br>
                                            <small class="text-muted">
                                                <span
                                                class="text-danger font-weight-bold">Note:</span>
                                                Mengupload file baru akan menghapus file yang lama.</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="other">File Lainnya:</label>
                                        <input type="url" name="drive_url"
                                            value="{{ old('drive_url', $showcase->drive_url) }}" id="other"
                                            class="form-control @error('drive_url') is-invalid @enderror">

                                        @error('drive_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <small class="text-muted"><span
                                                class="text-danger font-weight-bold">(opsional)</span> Jika punya file lain
                                            yang
                                            ingin dibagikan, upload di Google Drive dan masukkan linknya di kolom
                                            ini.</small>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    @if ($showcase->status == 'draft')
                                        <input type="submit" value="Simpan Draft" class="btn btn-primary" name="draft">
                                        <input type="submit" value="Terbitkan" class="btn btn-primary" name="publish">
                                        @else
                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                    @endif
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
            @if (count($showcase->media) > 0)
                @foreach ($showcase->media as $item)
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
            endpoint: '{{ route('api.showcases.update', $showcase->id) }}',
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
            metaFields: [{
                    id: 'title',
                    name: 'Judul foto',
                    placeholder: 'Judul foto ini'
                },
                {
                    id: 'description',
                    name: 'Deskripsi',
                    placeholder: 'Deskripsi foto ini'
                }
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

            fetch(`{{ route('api.showcases.destroy', $showcase->id) }}`, {
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
