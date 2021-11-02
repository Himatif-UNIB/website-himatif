
@extends('layouts.admin')
@section('title', $form->title)

@section('custom_head')
<link href="{{ asset('assets/themes/cork/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"
type="text/css" />
<link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
            <div class="widget-content widget-content-area">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="text-uppercase">
                            {{ $form->title }}
                        </h3>
                    </div>
                    <div>
                        @if (count($form->answers) > 0)
                        <a href="{{ route('admin.forms.answer.export', $form->id) }}" class="bs-tooltip" title="Download Excel" style="cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="currentColor" style="color: #12875E;">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        @endif
                        @if ($form->status == 2)
                        <a href="{{ route('form.show', ['form' => $form->id, 'slug' => $form->slug]) }}" target="_blank" class="mx-2 bs-tooltip" title="Lihat Formulir" style="cursor: pointer; color: gray;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg><span class="icon-name"></span>
                        </a>
                        @endif
                        <span class="custom-dropdown">
                            <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </span>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('admin.forms.edit', $form->id) }}">Edit</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#delete-modal" style="cursor:  pointer;">Hapus</a>
                                <hr style="margin: 5px 5px;">

                                @if (count($form->answers) > 0)
                                <a href="{{ route('admin.forms.answers', $form->id) }}" class="dropdown-item" style="cursor: pointer;">Lihat Jawaban</a>
                                @endif

                                @if ($form->status == 2)
                                <a class="dropdown-item" data-toggle="modal" data-target="#close-modal" style="cursor: pointer;">Tutup Formulir</a>
                                @endif
                                @if ($form->status == 3)
                                <a class="dropdown-item" data-toggle="modal" data-target="#open-modal" style="cursor: pointer;">Buka Formulir</a>
                                @endif
                            </div>
                        </span>
                    </div>
                </div>

                @if (session()->has('success'))
                <div class="text-success">
                    {{ session()->get('success') }}
                </div>
                @endif
            </div>
        </div>

        <div id="tabsIcons" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area icon-tab">
                    <ul class="nav nav-tabs  mb-3 mt-3" id="iconTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab"
                            aria-controls="icon-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-info">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg> Informasi Formulir</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" id="icon-answers-tab" data-toggle="tab" href="#icon-answers" role="tab"
                        aria-controls="icon-answers" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-message-circle">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                            </path>
                        </svg>
                        <span class="position-absolute badge badge-danger counter" style="right: 0; top: 0;">{{ count($form->answers) }}</span>
                        Jawaban
                        </a>
                </li>
            </ul>
    <div class="tab-content" id="iconTabContent-1">
        <div class="tab-pane fade show active" id="icon-home" role="tabpanel"
        aria-labelledby="icon-home-tab">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Judul</td>
                    <td><strong>{{ $form->title }}</strong></td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td><strong>{{ route('form.show', ['form' => $form->id, 'slug' => $form->slug]) }}</strong></td>
                </tr>
                <tr>
                    <td>Link Bitly</td>
                    <td><strong>{{ $form->bitly_link }}</strong></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>
                        <strong>
                            @if ($form->description == null)
                            Tidak ada deskripsi
                            @else
                            {{ $form->post_message }}
                            @endif
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah pertanyaan</td>
                    <td><strong>{{ count($form->questions) }}</strong></td>
                </tr>
                <tr>
                    <td>Dibuat oleh</td>
                    <td><strong>{{ $form->author->name }}</strong></td>
                </tr>
                <tr>
                    <td>Jawaban</td>
                    <td><strong>{{ count($form->answers) }}</strong></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <strong>
                            @if ($form->status == 1)
                            <span class="badge badge-secondary">Konsep</span>
                            @elseif ($form->status == 2)
                            <span class="badge badge-success">Dibuka</span>
                            @else
                            <span class="badge badge-danger">Ditutup</span>
                            @endif

                            @if (($form->max_fill_date != NULL && $form->max_fill_date < \Carbon\Carbon::now()) || ($form->max_fill_answer != NULL && count($form->answers) >= $form->max_fill_answer))
                            <span class="badge badge-secondary">Formulir sudah tidak menerima jawaban</span>
                            @endif
                        </strong>
                    </td>
                </tr>
                @if ($form->status == 3)
                <tr>
                    <td>Ditutup pada</td>
                    <td><strong>{{ \Carbon\Carbon::parse($form->closed_at)->format('l, d M Y H:i') }}</strong></td>
                </tr>
                @endif
                <tr>
                    <td>Pesan setelah submit</td>
                    <td>
                        <strong>
                            @if ($form->post_message == null)
                            Tidak ada pesan
                            @else
                            {{ $form->post_message }}
                            @endif
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>Batas waktu pengisian formulir</td>
                    <td>
                        <strong>
                            @if ($form->max_fill_date == null)
                            Tidak ada batas
                            @else
                            {{ \Carbon\Carbon::parse($form->max_fill_date)->format('l, d M Y H:i') }}
                            @endif
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>Batas jawaban yang diterima</td>
                    <td>
                        <strong>
                            @if ($form->max_fill_answer == null)
                            Tidak ada batas
                            @else
                            {{ $form->max_fill_answer }}
                            @endif
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>Dibuat pada</td>
                    <td><strong>{{ \Carbon\Carbon::parse($form->created_at)->format('l, d M Y H:i') }}</strong></td>
                </tr>
                <tr>
                    <td>Dipublikasikan pada</td>
                    <td><strong>
                        @if ($form->publish_at == NULL)
                        -
                        @else
                        {{ \Carbon\Carbon::parse($form->publish_at)->format('l, d M Y H:i') }}
                        @endif
                    </strong></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="icon-answers" role="tabpanel"
    aria-labelledby="icon-answers-tab2">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered" id="mytable">
            <thead>
                <tr>
                    @if (count($form->answers) > 0)
                    <th scope="col">#</th>
                    <th scope="col">Waktu</th>
                    @endif
                    @foreach ($form->questions as $item)
                    <th scope="col">{{ $item->question }}</th>
                    @endforeach
                </tr>
            </thead>
            @if (count($form->answers) > 0)
            <tbody>
                @foreach ($form->answers as $item)
                <tr>
                    <td>#{{ $item->id }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H :i') }}
                    </td>
                    @foreach ($item->answers as $answer)
                    <td>
                        @if (isset($answer->media[0]))
                        <a href="{{ $answer->media[0]->getFullUrl() }}"
                            target="_blank">{{ $answer->media[0]->file_name }}</a>
                            @else
                            @if ($answer->answer == null)
                            -
                            @else
                            {{ $answer->answer }}
                            @endif
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
        @if (count($form->answers) == 0)
        <div class="alert alert-info">
            Formulir ini belum memiliki jawaban.
        </div>
        @endif
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection

@section('custom_html')
@if ($form->status == 2)
<div class="modal fade" id="close-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ route('admin.forms.update', $form->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="action" value="close_form">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tutup Formulir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <p class="modal-text">
                Yakin ingin menutup formulir? Formulir yang ditutup tidak bisa diisi lagi, tetapi Anda bisa
                membukanya kembali kapanpun.
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
            <button type="submit" class="btn btn-primary">Tutup</button>
        </div>
    </form>
</div>
</div>
</div>
@endif

@if ($form->status == 3)
<div class="modal fade" id="open-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ route('admin.forms.update', $form->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="action" value="open_form">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buka Kembali Formulir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <p class="modal-text">
                Formulir ini sebelumnya sudah ditutup. Jika anda membukanya kembali, seseorang dapat kembali
                memberikan jawaban.
                <br>
                Anda bisa menutup kembali formulir ini kapan saja.
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
            <button type="submit" class="btn btn-primary">Buka</button>
        </div>
    </form>
</div>
</div>
</div>
@endif

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ route('admin.forms.destroy', $form->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="action" value="close_form">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Formulir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <p class="modal-text">
                Anda yakin ingin menghapus formulir ini?
                <br>
                Menghapus formulir juga akan menghapus semua pertanyaan dalam formulir ini beserta jawabannya. Tindakan ini tidak dapat dibatalkan.
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
    </form>
</div>
</div>
</div>
@endsection

@push('custom_js')
<script src="/js/app.js"></script>
@endpush