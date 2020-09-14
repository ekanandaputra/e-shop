<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.layouts.head')
</head>
<body> 
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
            <div class="main-content">
                @yield('content')
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>
    @include('admin.layouts.script')
</body>
</html>
