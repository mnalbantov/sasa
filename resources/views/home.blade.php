@extends('layouts.app')

@section('content')
    <section id="main" class="clearfix home-default">
        <div id="app" class="container">
            <!-- banner -->

            <div class="banner-section text-center">
                <h1 class="title">Намери своята квартира сега </h1>
                <h3>Бързо,лесно и удобно. Над 15 000 потребители вече ни се довериха.</h3>
                <!-- banner-form -->
                <div class="banner-form">
                    <form method="post" action="{{ route ('ads') }}">
                        {!! csrf_field() !!}
                        <!-- category-change -->
                        <div class="dropdown category-dropdown">
                            <a data-toggle="dropdown" href="#"><span class="change-text">Въведете адрес</span> <i
                                        class="fa fa-map-marker"></i></a>
                        </div><!-- category-change -->
                        {{--<input class="form-control" id="pac-input" type="text"--}}
                               {{--placeholder="Например ул 8-ми Декември, Студентски град?">--}}
                        {{--<button id="search" type="submit" class="form-control" value="Търси">Търсене</button>--}}
                        {{--<input type="hidden" id="lat" name="lat" value="">--}}
                        {{--<input type="hidden" id="lng" name="lng" value="">--}}
                        <auto-complete></auto-complete>
                    </form>
                    <div id="infowindow-content">
                        <img src="" width="16" height="16" id="place-icon">
                        <span id="place-name" class="title"></span><br>
                        <span id="place-address"></span>
                        <span id="place-postalCode"></span>
                    </div>

                    <div  style="display:none; width: 730px;height: 350px;" id="map"></div>

                </div><!-- banner-form -->

            </div>
            <!-- banner -->
            @include('partials._featured')
            @include('partials._trending')

        </div>
    </section>
    @include('partials._why-us')

@endsection

