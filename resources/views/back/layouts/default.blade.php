<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title') </title>
        @includeif('back.layouts.partial._default_css')
        @includeif ('back.layouts.partial._angular')
        @includeif('back.layouts.partial._css')
        @yield('myCss')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            var SiteUrl = '{{url("/")}}';
        </script>
    </head>
    <body ng-app="ngApp" class="nifty-ready pace-done">
        <div id="container" class="effect mainnav-lg">
            <div class="boxed">
                @includeif('back.layouts.partial._header')

                @yield('content')

                @includeif ('back.layouts.partial._menu')
             </div>
            @includeif('back.layouts.partial._default_js')
            @includeif('back.layouts.partial._js')
            @yield('myJs')
            @includeif('back.layouts.partial._footer')
        </div>
    </body>
</html>
