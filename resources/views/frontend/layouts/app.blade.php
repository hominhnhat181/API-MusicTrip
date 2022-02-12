<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    {{-- plugin --}}
    <link rel="stylesheet" href="{{ static_asset('assets/backend/css/aiz-core.css?v=' . time()) }}">
    <link rel="stylesheet" href="{{ static_asset('assets/backend/css/vendors.css?v=' . time()) }}">
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/player.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/material-dashboard.css') }}"  />

    <script>
        var AIZ = AIZ || {};
    </script>

    <title>{{ config('app.name', 'Music Trip') }}</title>

    @yield('css')

</head>

<body class="dark-edition">

    @include('frontend.inc.header')
    @include('frontend.inc.sidebar')

        @yield('content')

    @include('frontend.inc.footer')

    <!-- CoresJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets/frontend/js/handleAudio.js') }}"></script>
    <script>
        var ENDPOINT = "{{ url('/') }}";
        var page = 1;

        load_more(page);

        // height view
        var viewH = $(document).height();

        $(window).scroll(function() {
            // height full web
            var webH = $(window).height();

            if ($(document).scrollTop() >= (webH - viewH - 3)) {
                page++;
                load_more(page);
            }
            // console.log($(document).scrollTop());
            // console.log(webH - viewH );
            // console.log(viewH);
        });


        function load_more(page) {
            $.ajax({
                    url: ENDPOINT + "/?page=" + page,
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.auto-load').show();
                    }
                })

                .done(function(data) {
                    if (data.length == 0) {
                        $('.auto-load').html("No more records!");
                        return;
                    }
                    $('.auto-load').hide();
                    $('#list_feature').append(data);
                })

                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }

        $(document).ready(function() {
            //change the integers below to match the height of your upper div, which I called
            //banner.  Just add a 1 to the last number.  console.log($(window).scrollTop())
            //to figure out what the scroll position is when exactly you want to fix the nav
            //bar or div or whatever.  I stuck in the console.log for you.  Just remove when
            //you know the position.
            $(window).scroll(function() {
                console.log($(window).scrollTop());
                if ($(window).scrollTop() > 1) {
                    $('#navigation-example').addClass('navbar-fixed-top');
                    $('#navigation-example').removeClass('navbar-custom');
                    console.log('add class fixed to nav');
                }
                if ($(window).scrollTop() < 1) {
                    $('#navigation-example').addClass('navbar-custom');
                    $('#nav_bar').removeClass('navbar-fixed-top');
                    console.log('remove class fixed to nav');
                }
            });
        });
    </script>
    <script src="{{ static_asset('assets/backend/js/vendors.js') }}"></script>
    <script src="{{ static_asset('assets/backend/js/aiz-core.js') }}"></script>
    @yield('script')
</body>

</html>
