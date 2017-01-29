<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ elixir("css/styles.css") }}" rel="stylesheet">

    <!--[if IE]>
    <link href="{{ elixir("css/ie.css") }}" rel="stylesheet">
    <![endif]-->

    <!-- Scripts -->
    <script type="text/javascript" src="{{ elixir("js/all.js") }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class=" {{ $cssClass }}">

    @include('layouts.page.header')
    @yield('content')
    @include('layouts.page.footer')

</body>
</html>
