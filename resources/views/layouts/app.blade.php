<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ URL::to('/') }}">
    <title>{{ $title or 'Стая БГ | Намери своята квартира - Портал за споделени квартири и апартаменти' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet'
          type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="icon" href="http://habitatwc.org/wp-content/uploads/2014/06/habitat1.png">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEw6OPS5Cscr1vP_VCb_PfAmlTU0onm5k&libraries=places&language=bg"></script>
</head>
<body>

    @include('partials._header')

    @yield('content')

{{--    @include('partials._post-ad')--}}

    @include('layouts.footer')
    @include('scripts.scripts')
</body>
</html>