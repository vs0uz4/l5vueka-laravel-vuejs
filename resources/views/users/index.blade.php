<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem Vindos ao Curso!</title>
    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>
    <div class="container" id="app">
        <vd-users success="{{ Session::get('success') }}" token="{{ csrf_token() }}" list="{{ $users }}"></vd-users>
    </div>

<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>