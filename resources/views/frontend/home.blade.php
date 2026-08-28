@extends('layouts.app')

@section('title', 'Home')

@section('meta_description', 'Discover electronics, fashion, watches and footwear at Ali Shop.')

@section('content')

    @include('partials.frontend.hero')

    @include('partials.frontend.categories')

    @include('partials.frontend.store_trending')

    @include('partials.frontend.store_editorial')

    @include('partials.frontend.store_services')

    @include('partials.frontend.store_newsletter')

@endsection