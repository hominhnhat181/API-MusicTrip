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
    <link rel="stylesheet" href="{{ static_asset('assets/backend/css/style.css?v=' . time()) }}">

    <!-- Favicon -->
    <title>{{ config('app.name', 'Rehau') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ my_asset('assets/img/title-logo.png') }}" />
    @yield('css')

    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_found: "{{ translate('Nothing found') }}",
            choose_file: "{{ translate('Choose file') }}",
            file_selected: "{{ translate('File selected') }}",
            files_selected: "{{ translate('Files selected') }}",
            add_more_files: "{{ translate('Add more files') }}",
            adding_more_files: "{{ translate('Adding more files') }}",
            drop_files_here_paste_or: "{{ translate('Drop files here, paste or') }}",
            browse: "{{ translate('Browse') }}",
            upload_complete: "{{ translate('Upload complete') }}",
            upload_paused: "{{ translate('Upload paused') }}",
            resume_upload: "{{ translate('Resume upload') }}",
            pause_upload: "{{ translate('Pause upload') }}",
            retry_upload: "{{ translate('Retry upload') }}",
            cancel_upload: "{{ translate('Cancel upload') }}",
            uploading: "{{ translate('Uploading') }}",
            processing: "{{ translate('Processing') }}",
            complete: "{{ translate('Complete') }}",
            file: "{{ translate('File') }}",
            files: "{{ translate('Files') }}",
        }
    </script>
</head>

<body>

    @yield('content')

    @yield('modal')

    {{-- caledar --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('assets/backend/js/caledar.js') }}"></script>
    
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