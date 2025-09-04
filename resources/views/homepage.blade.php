{{-- File: resources/views/welcome.blade.php --}}

@extends('home-page.layouts.app')

@section('content')

    {{-- Menyusun setiap bagian/komponen dari landing page --}}
    @include('home-page.partials.hero')
    @include('home-page.partials.features')
    @include('home-page.partials.testimonials')
    @include('home-page.partials.cta')

@endsection
