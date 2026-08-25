@extends('layouts.app')
@section('title', 'Homepage')
@section('content')

@include('partials.frontend.sliders')

@include('partials.frontend.browse_categories')

@include('partials.frontend.banner_area')

<livewire:frontend.product.top-trending-products />

@include('partials.frontend.services_area')

@endsection

