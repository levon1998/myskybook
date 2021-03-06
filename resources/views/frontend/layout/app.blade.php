<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/frontend/css/plugins.css') }}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/frontend/css/toastr.min.css') }}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/frontend/css/main.css') }}" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
        @yield('styles')
    </head>

    <body>
        <div class="site-wrapper" id="top">
            @include('frontend.layout.header')

            @yield('content')
        </div>
        @include('frontend.layout.footer')

        <script src="{{ asset('/frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('/frontend/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('/frontend/js/toastr.min.js') }}"></script>
        <script src="{{ asset('/frontend/js/custom.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('scripts')
    </body>
</html>