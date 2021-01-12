@extends('layouts.admin')
@section('title', 'Jawaban Formulir '. $form->title)

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
            <div class="widget-content widget-content-area">
                <h3>
                    {{ $form->title }} - Jawaban
                </h3>
            </div>
        </div>

        <div class="col-lg-12 col-12 layout-spacing">
        </div>

    </div>
</div>
@endsection