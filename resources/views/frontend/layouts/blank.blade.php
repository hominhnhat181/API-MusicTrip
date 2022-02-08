<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL') }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- css --}}
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ static_asset('assets/backend/css/aiz-core.css?v=' . time()) }}">
    <link rel="stylesheet" href="{{ static_asset('assets/backend/css/vendors.css?v=' . time()) }}">
    <link rel="stylesheet" href="{{ static_asset('assets/frontend/css/style.css?v=' . time()) }}">

    <!-- Favicon -->
    <title>{{ config('app.name', 'Rehau') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ my_asset('assets/img/title-logo.png') }}" />
    @yield('css')

    <script>
        var AIZ = AIZ || {};
    </script>
</head>

<body>
    @yield('modal')
    @yield('content')

    <script defer src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ static_asset('assets/backend/js/vendors.js') }}"></script>
    <script src="{{ static_asset('assets/backend/js/aiz-core.js') }}"></script>

    {{-- @guest
    @include('frontend.auth.register-script')
    @endguest --}}

    @yield('script')

    <script type="text/javascript">
	    @foreach (session('flash_notification', collect())->toArray() as $message)
	        AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
	    @endforeach
    </script>

</body>

</html>