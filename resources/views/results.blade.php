@extends('layouts.app')

@section('content')
    <section id="main" class="clearfix category-page">
        <div class="container">
            @include('partials._breadcrumbs')

            @include('partials._searchbar')
            @include('partials.ads')
        </div>
    </section>
    @include('partials._post-ad')

@endsection