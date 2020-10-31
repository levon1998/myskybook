<!DOCTYPE html>
<html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/js/deploy/css/flipbook.style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/js/deploy/css/font-awesome.css') }}">

        <script src="{{ asset('/frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('/frontend/js/deploy/js/flipbook.min.js') }}"></script>
    </head>

    <body>
    <div id="container"></div>

    <script type="text/javascript">
        $("#container").flipBook({
            pages:[
                @foreach ($files as $key => $file)
                    @php ($path = Illuminate\Support\Facades\Storage::disk('s3')->url($file))
                    {src:"{{ $path }}", thumb:"{{ $path }}", title:"{{ $key+1 }}"},
                @endforeach

            ],

            btnZoomIn : {vAlign:'top', hAlign:'right'},
            btnZoomOut : {vAlign:'top', hAlign:'right'},
            btnToc : {vAlign:'top', hAlign:'right'},
            btnThumbs : {vAlign:'top', hAlign:'left'},
            btnBookmark : {vAlign:'top', hAlign:'left'},
            btnExpand : {vAlign:'top', hAlign:'right'},
            currentPage:{hAlign:'center'},

            viewMode:'3d',

            skin:'dark',

            menuMargin:10,
            menuTransparent:true,
            menuOverBook:true,

            menu2Margin:10,
            menu2Transparent:true,
            menu2OverBook:true,

            btnBackground:"rgba(0,0,0,.3)",
            btnColor:'rgb(255,120,60)',
        });
    </script>
    </body>

</html>