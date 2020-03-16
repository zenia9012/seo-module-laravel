<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('seo::admin.includes.css')
    </head>
    <body>
        <div id="app">

            @include('seo::admin.includes.header')

            @yield('content')

            @include('seo::admin.includes.footer')

            @if(\Session::has('message'))
                <div class="message-alert-show alert alert-info">{{ \Session::get('message') }}</div>
            @endif
        </div>

        @include('seo::admin.includes.script')
    </body>
</html>
