<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- plugin --}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- player --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/7061c063c6.js" crossorigin="anonymous"></script>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/player.css') }}">
    <link href="{{ asset('assets/frontend/css/material-dashboard.css') }}" rel="stylesheet" />

    <title>Home</title>

</head>

<body class="dark-edition">
    {{-- <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=495127995056192&autoLogAppEvents=1"
    nonce="mgnraTKs"></script> --}}

    @include('frontend.inc.header')
    @include('frontend.inc.sidebar')

    @yield('content')

    @include('frontend.inc.footer')

    <!-- CoresJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}

    {{-- <script src="{{ asset('assets/back/js/auth.js') }}"></script> --}}
    {{-- loadMore script --}}
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
    </script>
    @yield('script')
</body>

</html>
