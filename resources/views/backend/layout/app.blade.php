<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title')</title>

        <link href="{{ asset('/backend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

        <link href="{{ asset('/backend/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('/backend/css/style.css') }}" rel="stylesheet">

    </head>

    <body>
        <div id="wrapper">
            @include('backend.layout.sidebar')
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    @include('backend.layout.header')
                </div>
                    <div class="row  border-bottom white-bg dashboard-header">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>


        <!-- Mainly scripts -->
        <script src="{{ asset('/backend/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('/backend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
        <script src="{{ asset('/backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('/backend/js/inspinia.js') }}"></script>
        <script src="{{ asset('/backend/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    </body>
</html>
