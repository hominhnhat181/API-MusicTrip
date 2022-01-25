<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL') }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- header css -->
    <link rel="stylesheet" href="{{ static_asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    {{-- css --}}
    <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css?v=' . time()) }}">
    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css?v=' . time()) }}">


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
    @include('frontend.inc.header')

    @yield('content')

    @include('frontend.inc.footer')

    @include('frontend.auth.register_popup')

    @yield('modal')

    <script src="{{ static_asset('assets/js/vendors.js') }}"></script>
    <script src="{{ static_asset('assets/js/aiz-core.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>

    @guest
    @include('frontend.auth.register-script')
    @endguest

    @yield('script')

    <script type="text/javascript">
        @foreach(session('flash_notification', collect())->toArray() as $message)
        message = "{{ $message['message'] }}"
        level = "{{ $message['level'] }}"
        startOption = message.indexOf("{");
        endOption = message.indexOf("}");
        options = message.substring(startOption, endOption + 1);
        options = jQuery.parseJSON(options ? options.replace(/\&#039;/g, '"') : "{}");
        message = message.substring(0, startOption > 0 ? startOption : message.length);
        AIZ.plugins.notify(level, message, options);
        @endforeach
    </script>

</body>

</html>