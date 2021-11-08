@component('mail::message')
# Sertifikat Kegiatan Himatif

Sertifikat ini diberikan kepada {{ $name }}, karena telah mengikuti salah satu kegiatan Himatif.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
