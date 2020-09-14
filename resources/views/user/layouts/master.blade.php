<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('user.layouts.head')
</head>
<body> 
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('user.layouts.header')
            @include('user.layouts.sidebar')
            <div class="main-content">
                @yield('content')
            </div>
            @include('user.layouts.footer')
        </div>
    </div>
    @include('user.layouts.script')
</body>
</html>
