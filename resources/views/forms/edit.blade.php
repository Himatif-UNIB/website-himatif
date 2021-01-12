@extends('layouts.admin')
@section('title', $form->title . ' - Edit Formulir')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>
                        {{ $form->title }}
                    </h3>
                    <p>
                        {{ $form->description }}
                    </p>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <form action="{{ route('forms.update', $form->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="action" value="edit_form">

                    @if ($displayIdentity == true)
                    <div class="widget-content widget-content-area br-6 mb-2">
                        <div class="form-group">
                            <label for="title">Judul Formulir: <span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $form->title) }}" id="title" name="title" required="required" maxlength="255"
                                minlength="4">

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="picture">Gambar utama:</label>
                            <input type="file" name="picture" id="picture"
                                class="form-control @error('picture') is-invalid @enderror">

                            @error('picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi:</label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $form->description) }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="post-message">Pesan setelah mengirim formulir:</label>
                                    <textarea name="post_message" id="post-message"
                                        class="form-control @error('post_message') is-invalid @enderror">{{ old('post_message', $form->post_message) }}</textarea>

                                    @error('post_message')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="auto-close">Otomatis tutup formulir pada:</label>
                                    <input type="text"
                                        class="form-control @error('auto_close_date') }} is-invalid @enderror"
                                        id="auto-close" name="auto_close_date">

                                    @error('auto_close_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span class="text-muted">Kosongkan jika tidak ingin menutup formulir secara
                                        otomatis</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="auto-close-answer">Otomatis tutup formulir jika sudah mendapatkan
                                        jawaban:</label>
                                    <input type="number"
                                        class="form-control @error('auto_close_answer') is-invalid @enderror"
                                        id="auto-close-answer" name="auto_close_answer" value="{{ old('auto_close_answer', $form->auto_close_answer) }}">

                                    @error('auto_close_answer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span class="text-muted">Kosongkan jika tidak ingin menutup formulir secara
                                        otomatis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @foreach ($form->questions as $item)
                    <div class="widget-content widget-content-area br-6 container-{{ $item->id }} field-container mb-2" data-id="{{ $item->id }}">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="question-{{ $item->id }}">Pertanyaan: <span
                                        class="text-danger font-weight-bold">*</span></label>
                                <input type="text" class="form-control field-question" id="question-{{ $item->id }}"
                                    name="question[{{ $item->id }}][title]" value="{{ old('question['. $item->id .'][title]', $item->question) }}"
                                    required="required">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="type-0">Jenis pertanyaan:</label>
                                <select name="question[{{ $item->id }}][type]" id="type-{{ $item->id }}"
                                    class="form-control field-type" data-id="{{ $item->id }}"
                                    required="required">
                                    <option disabled="disabled">Pilih:</option>
                                    <option value="1" @if(old('question['. $item->id .'][type]', $item->type) == 1) selected="selected" @endif>Jawaban pendek</option>
                                    <option value="2" @if(old('question['. $item->id .'][type]', $item->type) == 2) selected="selected" @endif>Jawaban panjang</option>
                                    <option value="3" @if(old('question['. $item->id .'][type]', $item->type) == 3) selected="selected" @endif>Pilihan ganda</option>
                                    <option value="4" @if(old('question['. $item->id .'][type]', $item->type) == 4) selected="selected" @endif>Pilihan centang</option>
                                    <option value="5" @if(old('question['. $item->id .'][type]', $item->type) == 5) selected="selected" @endif>Dropdown</option>
                                    <option value="6" @if(old('question['. $item->id .'][type]', $item->type) == 6) selected="selected" @endif>Tanggal</option>
                                    <option value="7" @if(old('question['. $item->id .'][type]', $item->type) == 7) selected="selected" @endif>Waktu</option>
                                    <option value="8" @if(old('question['. $item->id .'][type]', $item->type) == 8) selected="selected" @endif>Tanggal dan Waktu</option>
                                    <option value="9" @if(old('question['. $item->id .'][type]', $item->type) == 9) selected="selected" @endif>Upload file</option>
                                </select>
                            </div>
                        </div>

                        <div class="type-container mt-2"></div>

                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="text-right">
                                    <div class="form-group">
                                        <input type="checkbox" name="question[{{ $item->id }}][is_required]" id="" value="1">
                                        Kolom ini harus diisi?
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-right">
                                    <a href="#" class="btn-new-field">Tambah kolom</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="new-field-container"></div>

                    <div class="widget-content widget-content-area mt-2">
                        <div class="text-right">
                            @if ($form->status == 1)
                                <input type="submit" value="Simpan Draft" name="save_as_draft" class="btn btn-secondary">
                                <input type="submit" value="Terbitkan Formulir" class="btn btn-primary">
                            @elseif ($form->status == 2)
                                <input type="submit" value="Simpan Formulir" class="btn btn-primary">
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        $(document).on('change', '.field-type', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            const fieldID = $(this).val();

            const container = document.querySelector('.container-' + id);
            const containerMessage = container.querySelector('.type-container');

            while (containerMessage.firstChild) {
                containerMessage.removeChild(containerMessage.firstChild);
            }

            switch (fieldID) {
                case '1':
                    containerMessage.innerHTML =
                        'Jawaban singkat memungkinkan pengguna memberikan jawaban teks dengan <b>maksimal 255 karakter</b>';
                    break;
                case '2':
                    containerMessage.innerHTML =
                        'Jawaban panjang memungkinkan pengguna memberikan jawaban teks <b>hingga 5000 karakter</b> dengan dukungan <u>kode HTML</u>';
                    break;
                case '3':
                    let num = 1;

                    containerMessage.innerHTML =
                        `Kolom <b>pilihan </b> mengizinkan pengguna <u>memilih hanya satu</u> dari beberapa pilihan.
                                    Klik "+" untuk menambah pilihan lain`;

                    const optionGroup = document.createElement('div');
                    optionGroup.classList.add('form-group');

                    const optionLabel = document.createElement('label');
                    optionLabel.innerHTML = `Pilihan ke ${num}`;

                    const optionInputGroup = document.createElement('div');
                    optionInputGroup.classList.add('input-group');

                    const optionInput = document.createElement('input');
                    optionInput.setAttribute('type', 'text');
                    optionInput.setAttribute('name', `question[${id}][multiple_options][]`);
                    optionInput.classList.add('form-control');

                    optionInputGroup.appendChild(optionInput);

                    const optionAppend = document.createElement('div');
                    optionAppend.classList.add('input-group-append');
                    const optionAppendSpan = document.createElement('span');
                    optionAppendSpan.classList.add('input-group-text');

                    const optionAppendBtn = document.createElement('button');
                    optionAppendBtn.setAttribute('type', 'button');
                    optionAppendBtn.setAttribute('data-number', num);
                    optionAppendBtn.setAttribute('data-id', id);
                    optionAppendBtn.classList.add('btn');
                    optionAppendBtn.classList.add('btn-primary');
                    optionAppendBtn.classList.add('btn-sm');
                    optionAppendBtn.classList.add('add-radio-btn');
                    optionAppendBtn.innerHTML = '<i class="fa fa-plus"></i>';

                    optionAppendSpan.appendChild(optionAppendBtn);
                    optionAppend.appendChild(optionAppendSpan);
                    optionInputGroup.appendChild(optionAppend);

                    optionGroup.appendChild(optionLabel);
                    optionGroup.appendChild(optionInputGroup);

                    containerMessage.appendChild(optionGroup)
                    break;
                case '4':
                    let cbNum = 1;

                    containerMessage.innerHTML =
                        'Pengguna dapat memilih <u>satu atau lebih</u> pilihan yang diberikan';

                    const checkboxGroup = document.createElement('div');
                    checkboxGroup.classList.add('form-group');

                    const checkboxLabel = document.createElement('label');
                    checkboxLabel.innerHTML = `Pilihan ke ${cbNum}`;

                    const checkboxInputGroup = document.createElement('div');
                    checkboxInputGroup.classList.add('input-group');

                    const checkboxInput = document.createElement('input');
                    checkboxInput.setAttribute('type', 'text');
                    checkboxInput.setAttribute('name', `question[${id}][multiple_options][]`);
                    checkboxInput.classList.add('form-control');

                    checkboxInputGroup.appendChild(checkboxInput);

                    const checkboxAppend = document.createElement('div');
                    checkboxAppend.classList.add('input-group-append');
                    const checkboxAppendSpan = document.createElement('span');
                    checkboxAppendSpan.classList.add('input-group-text');

                    const checkboxAppendBtn = document.createElement('button');
                    checkboxAppendBtn.setAttribute('type', 'button');
                    checkboxAppendBtn.setAttribute('data-number', cbNum);
                    checkboxAppendBtn.setAttribute('data-id', id);
                    checkboxAppendBtn.classList.add('btn');
                    checkboxAppendBtn.classList.add('btn-primary');
                    checkboxAppendBtn.classList.add('btn-sm');
                    checkboxAppendBtn.classList.add('add-checkbox-btn');
                    checkboxAppendBtn.innerHTML = '<i class="fa fa-plus"></i>';

                    checkboxAppendSpan.appendChild(checkboxAppendBtn);
                    checkboxAppend.appendChild(checkboxAppendSpan);
                    checkboxInputGroup.appendChild(checkboxAppend);

                    checkboxGroup.appendChild(checkboxLabel);
                    checkboxGroup.appendChild(checkboxInputGroup);

                    containerMessage.appendChild(checkboxGroup)
                    break;
                case '5':
                    let sNum = 1;
                    containerMessage.innerHTML =
                        `Dropdown memberikan pengguna <u>hanya satu</u> dari beberapa pilihan yang diberikan.`;

                    const selectGroup = document.createElement('div');
                    selectGroup.classList.add('form-group');

                    const selectLabel = document.createElement('label');
                    selectLabel.innerHTML = `Pilihan ke ${sNum}`;

                    const selectInputGroup = document.createElement('div');
                    selectInputGroup.classList.add('input-group');

                    const selectInput = document.createElement('input');
                    selectInput.setAttribute('type', 'text');
                    selectInput.setAttribute('name', `question[${id}][multiple_options][]`);
                    selectInput.classList.add('form-control');

                    selectInputGroup.appendChild(selectInput);

                    const selectAppend = document.createElement('div');
                    selectAppend.classList.add('input-group-append');
                    const selectAppendSpan = document.createElement('span');
                    selectAppendSpan.classList.add('input-group-text');

                    const selectAppendBtn = document.createElement('button');
                    selectAppendBtn.setAttribute('type', 'button');
                    selectAppendBtn.setAttribute('data-number', sNum);
                    selectAppendBtn.setAttribute('data-id', id);
                    selectAppendBtn.classList.add('btn');
                    selectAppendBtn.classList.add('btn-primary');
                    selectAppendBtn.classList.add('btn-sm');
                    selectAppendBtn.classList.add('add-select-btn');
                    selectAppendBtn.innerHTML = '<i class="fa fa-plus"></i>';

                    selectAppendSpan.appendChild(selectAppendBtn);
                    selectAppend.appendChild(selectAppendSpan);
                    selectInputGroup.appendChild(selectAppend);

                    selectGroup.appendChild(selectLabel);
                    selectGroup.appendChild(selectInputGroup);

                    containerMessage.appendChild(selectGroup)
                    break;
                case '6':
                    containerMessage.innerHTML =
                        'Pengguna dapat memberikan jawaban berupa: tahun, bulan dan tanggal';
                    break;
                case '7':
                    containerMessage.innerHTML = 'Pengguna dapat memberikan jawaban berupa waktu';
                    break;
                case '8':
                    containerMessage.innerHTML = 'Pengguna dapat memberikan jawaban berupa tanggal dan waktu';
                    break;
                case '9':
                    containerMessage.innerHTML = 'Pengguna dapat mengunggah berkas dengan kolom ini';

                    const fileRow = document.createElement('div');
                    fileRow.classList.add('row');

                    const firstCol = document.createElement('div');
                    firstCol.classList.add('col-md-6');
                    firstCol.classList.add('col-sm-12');

                    const fileMimesDiv = document.createElement('div');
                    fileMimesDiv.classList.add('form-group');
                    const fileMimesLabel = document.createElement('label');
                    fileMimesLabel.innerHTML = 'Format berkas yang diizinkan:';
                    const fileMimesInput = document.createElement('input');
                    fileMimesInput.classList.add('form-control');
                    fileMimesInput.setAttribute('name', `question[${id}][file_mimes]`);
                    const fileMimesHelp = document.createElement('div');
                    fileMimesHelp.classList.add('text-muted');
                    fileMimesHelp.innerHTML =
                        `Pisahkan setiap format dengan koma. Contoh: <b>jpg,xlsx,pdf</b>.
                                Kosongkan untuk mengizinkan semua jenis berkas.
                                `;

                    fileMimesDiv.appendChild(fileMimesLabel);
                    fileMimesDiv.appendChild(fileMimesInput);
                    fileMimesDiv.appendChild(fileMimesHelp);

                    firstCol.appendChild(fileMimesDiv);

                    const secondCol = document.createElement('div');
                    secondCol.classList.add('col-md-6');
                    secondCol.classList.add('col-sm-12');

                    const fileMaxDiv = document.createElement('div');
                    fileMaxDiv.classList.add('form-group');
                    const fileMaxLabel = document.createElement('label');
                    fileMaxLabel.innerHTML = 'Format berkas yang diizinkan:';
                    const fileMaxInput = document.createElement('input');
                    fileMaxInput.setAttribute('type', 'number');
                    fileMaxInput.classList.add('form-control');
                    fileMaxInput.setAttribute('name', `question[${id}][file_max_size]`);
                    const fileMaxHelp = document.createElement('div');
                    fileMaxHelp.classList.add('text-muted');
                    fileMaxHelp.innerHTML =
                        'Masukkan dalam ukuran KB. Kosongkan untuk tidak membatasi ukuran maksimal file';

                    fileMaxDiv.appendChild(fileMaxLabel);
                    fileMaxDiv.appendChild(fileMaxInput);
                    fileMaxDiv.appendChild(fileMaxHelp);

                    secondCol.appendChild(fileMaxDiv);

                    fileRow.appendChild(firstCol);
                    fileRow.appendChild(secondCol);

                    containerMessage.appendChild(fileRow);
                    break;
            }
        });

        let lastRadioNumber = 1;
        let lastSelectNumber = 1;
        let lastCheckboxNumber = 1;

        $(document).on('click', '.btn-new-field', function(e) {
            e.preventDefault();

            lastRadioNumber = 1;
            lastSelectNumber = 1;
            lastCheckboxNumber = 1;

            const date = new Date();

            const currentID = parseInt($(this).parent().parent().parent().parent().attr('data-id'));
            const newId = date.getTime();

            const cloneDiv = $(`.container-${currentID}`).clone();
            $('.type-container', cloneDiv).empty();
            cloneDiv.addClass('mt-2');
            cloneDiv.removeClass(`container-${currentID}`);
            cloneDiv.addClass(`container-${newId}`);
            cloneDiv.attr('data-id', newId);

            cloneDiv.find(`[for="question-${currentID}"]`).attr('for', `question-${newId}`);
            $(`.field-question`, cloneDiv).attr('id', `question-${newId}`);
            $(`.field-question`, cloneDiv).attr('name', `question[${newId}][title]`);
            $(`.field-question`, cloneDiv).val(null);

            cloneDiv.find(`[for="type-${currentID}"]`).attr('for', `type-${newId}`);
            $(`.field-type`, cloneDiv).attr('id', `type-${newId}`);
            $(`.field-type`, cloneDiv).attr('data-id', newId);
            $(`.field-type`, cloneDiv).attr('name', `question[${newId}][type]`);

            $('.new-field-container').append(cloneDiv);
        });

        $(document).on('click', '.add-radio-btn', function(e) {
            e.preventDefault();

            lastRadioNumber += 1;
            lastSelectNumber = 1;
            lastCheckboxNumber = 1;

            const id = $(this).data('id');
            const num = lastRadioNumber;

            const container = document.querySelector('.container-' + id);
            const containerMessage = container.querySelector('.type-container');

            const newOptionsContainer = document.createElement('div');

            const optionGroup = document.createElement('div');
            optionGroup.classList.add('form-group');

            const optionLabel = document.createElement('label');
            optionLabel.innerHTML = `Pilihan ke ${num}`;

            const optionInputGroup = document.createElement('div');
            optionInputGroup.classList.add('input-group');

            const optionInput = document.createElement('input');
            optionInput.setAttribute('type', 'text');
            optionInput.setAttribute('name', `question[${id}][multiple_options][]`);
            optionInput.classList.add('form-control');

            optionInputGroup.appendChild(optionInput);

            const optionAppend = document.createElement('div');
            optionAppend.classList.add('input-group-append');
            const optionAppendSpan = document.createElement('span');
            optionAppendSpan.classList.add('input-group-text');

            const optionAppendBtn = document.createElement('button');
            optionAppendBtn.setAttribute('type', 'button');
            optionAppendBtn.setAttribute('data-number', num);
            optionAppendBtn.setAttribute('data-id', id);
            optionAppendBtn.classList.add('btn');
            optionAppendBtn.classList.add('btn-primary');
            optionAppendBtn.classList.add('btn-sm');
            optionAppendBtn.classList.add('add-radio-btn');
            optionAppendBtn.innerHTML = '<i class="fa fa-plus"></i>';

            optionAppendSpan.appendChild(optionAppendBtn);
            optionAppend.appendChild(optionAppendSpan);
            optionInputGroup.appendChild(optionAppend);

            optionGroup.appendChild(optionLabel);
            optionGroup.appendChild(optionInputGroup);

            containerMessage.appendChild(optionGroup);
        });

        $(document).on('click', '.add-checkbox-btn', function(e) {
            e.preventDefault();

            lastCheckboxNumber += 1;
            lastSelectNumber = 1;
            lastRadioNumber = 1;

            const id = $(this).data('id');
            const num = lastCheckboxNumber;

            const container = document.querySelector('.container-' + id);
            const containerMessage = container.querySelector('.type-container');

            const checkboxGroup = document.createElement('div');
            checkboxGroup.classList.add('form-group');

            const checkboxLabel = document.createElement('label');
            checkboxLabel.innerHTML = `Pilihan ke ${num}`;

            const checkboxInputGroup = document.createElement('div');
            checkboxInputGroup.classList.add('input-group');

            const checkboxInput = document.createElement('input');
            checkboxInput.setAttribute('type', 'text');
            checkboxInput.setAttribute('name', `question[${id}][multiple_options][]`);
            checkboxInput.classList.add('form-control');

            checkboxInputGroup.appendChild(checkboxInput);

            const checkboxAppend = document.createElement('div');
            checkboxAppend.classList.add('input-group-append');
            const checkboxAppendSpan = document.createElement('span');
            checkboxAppendSpan.classList.add('input-group-text');

            const checkboxAppendBtn = document.createElement('button');
            checkboxAppendBtn.setAttribute('type', 'button');
            checkboxAppendBtn.setAttribute('data-number', num);
            checkboxAppendBtn.setAttribute('data-id', id);
            checkboxAppendBtn.classList.add('btn');
            checkboxAppendBtn.classList.add('btn-primary');
            checkboxAppendBtn.classList.add('btn-sm');
            checkboxAppendBtn.classList.add('add-checkbox-btn');
            checkboxAppendBtn.innerHTML = '<i class="fa fa-plus"></i>';

            checkboxAppendSpan.appendChild(checkboxAppendBtn);
            checkboxAppend.appendChild(checkboxAppendSpan);
            checkboxInputGroup.appendChild(checkboxAppend);

            checkboxGroup.appendChild(checkboxLabel);
            checkboxGroup.appendChild(checkboxInputGroup);

            containerMessage.appendChild(checkboxGroup)
        });

        $(document).on('click', '.add-select-btn', function(e) {
            e.preventDefault();

            lastSelectNumber += 1;
            lastRadioNumber = 1;
            lastCheckboxNumber = 1;

            const id = $(this).data('id');
            const num = lastSelectNumber;

            const container = document.querySelector('.container-' + id);
            const containerMessage = container.querySelector('.type-container');

            selectGroup = document.createElement('div');
            selectGroup.classList.add('form-group');

            selectLabel = document.createElement('label');
            selectLabel.innerHTML = `Pilihan ke ${num}`;

            selectInputGroup = document.createElement('div');
            selectInputGroup.classList.add('input-group');

            const selectInput = document.createElement('input');
            selectInput.setAttribute('type', 'text');
            selectInput.setAttribute('name', `question[${id}][multiple_options][]`);
            selectInput.classList.add('form-control');

            selectInputGroup.appendChild(selectInput);

            selectAppend = document.createElement('div');
            selectAppend.classList.add('input-group-append');
            const selectAppendSpan = document.createElement('span');
            selectAppendSpan.classList.add('input-group-text');

            const selectAppendBtn = document.createElement('button');
            selectAppendBtn.setAttribute('type', 'button');
            selectAppendBtn.setAttribute('data-number', num);
            selectAppendBtn.setAttribute('data-id', id);
            selectAppendBtn.classList.add('btn');
            selectAppendBtn.classList.add('btn-primary');
            selectAppendBtn.classList.add('btn-sm');
            selectAppendBtn.classList.add('add-select-btn');
            selectAppendBtn.innerHTML = '<i class="fa fa-plus"></i>';

            selectAppendSpan.appendChild(selectAppendBtn);
            selectAppend.appendChild(selectAppendSpan);
            selectInputGroup.appendChild(selectAppend);

            selectGroup.appendChild(selectLabel);
            selectGroup.appendChild(selectInputGroup);

            containerMessage.appendChild(selectGroup)
        });

    </script>
@endpush
