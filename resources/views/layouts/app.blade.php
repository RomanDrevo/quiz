<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quiz</title>

    <!-- Styles -->
    <link href="/css/main-app.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

@yield("extra_styles")
<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">


    @yield('content')

</div>
<!-- Scripts -->
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>

<script src="dist/sweetalert.min.js"></script>



@yield('extra_scripts')

</body>
</html>