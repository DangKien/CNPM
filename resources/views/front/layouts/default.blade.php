<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title') </title>
        <script>
            var SiteUrl = '{{url("/")}}';
        </script>
        @includeif ('front.layouts.partial._angular')
        @includeif('front.layouts.partial._default_css')
        @includeif('front.layouts.partial._css')
        @yield('myCss')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
    </head>
    <body ng-app="ngApp" ng-cloak class="nifty-ready pace-done">
        <div id="container" class="effect mainnav-lg">
            <div class="boxed">
                @includeif('front.layouts.partial._header')
                @includeif ('front.layouts.partial._menu')
                @yield('content')
             </div>
            @includeif('front.layouts.partial._default_js')
            @includeif('front.layouts.partial._js')
            @yield('myJs')
            @includeif('front.layouts.partial._footer')
        </div>
    </body>
</html>
