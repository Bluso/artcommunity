<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <title>[ มปอ ] - @yield('title')</title>
        <link href="{{ asset('css/app.css') }}?v={{ today()->format('Ymd') }}-1" rel="stylesheet">
        @stack('style')
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header class="menu">
            @include('layouts.menu')
        </header>
        <section class="content">
            @yield('content')
        </section>
        <footer>
            @include('layouts.footer')
        </footer>
        <script src="{{ asset('js/app.js') }}?v={{ today()->format('Ymd') }}-1" type="text/javascript" charset="utf-8" async defer></script>
        @stack('js')
    </body>
</html>