@extends('Fronted.layouts.master')

@section('title')
    ورشه كنوز للنجاره
    @endsection

@section('content')
    @include('Fronted.GeneralPages.slider')
    @include('Fronted.GeneralPages.homeCategory')
    @include('Fronted.GeneralPages.homeProjects')
{{--    @include('Fronted.Services.homeServices')--}}
{{--    @include('Fronted.Consults.homeConsults')--}}
@endsection