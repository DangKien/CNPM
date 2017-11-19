<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title') </title>
        <link rel="icon" href="{{ url('Frontend/img/logo_title1.png') }}" type="image/gif" sizes="32x32">
        <script>
            var SiteUrl = '{{url("/")}}';
            var path    = '{{ request()->path() }}';
        </script>
        @includeif ('front.layouts.partial._angular')
        @includeif('front.layouts.partial._default_css')
        @includeif('front.layouts.partial._css')
        @yield('myCss')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
    </head>
    <body ng-app="ngApp" ng-cloak>
        @includeif('front.layouts.partial._header')
        @includeif ('front.layouts.partial._menu')
        @yield('content')
        @includeif('front.layouts.partial._footer')
        @includeif('front.layouts.partial._default_js')
        @includeif('front.layouts.partial._js')
        @yield('myJs')
    </body>
</html>
