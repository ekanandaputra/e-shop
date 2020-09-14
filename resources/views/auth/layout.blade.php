<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; HPE Online</title>
    <link rel="stylesheet" href="{{ asset('template/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/modules/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/components.css') }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body style="background-color:#2980b9;">
    <div id="app">
        <section class="section">
            <div class="container mt-3">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
    
    <script src="{{ asset('template/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('template/modules/popper.js') }}"></script>
    <script src="{{ asset('template/modules/tooltip.js') }}"></script>
    <script src="{{ asset('template/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/modules/moment.min.js') }}"></script>
    <script src="{{ asset('template/js/stisla.js') }}"></script>
    <script src="{{ asset('template/js/scripts.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
</body>
</html>