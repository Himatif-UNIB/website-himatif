@extends('errors::illustrated-layout')

@section('title', __('Tidak Tersedia'))
@section('code', '410')
@section('message',__($exception->getMessage() ?: 'Tidak Tersedia'))
