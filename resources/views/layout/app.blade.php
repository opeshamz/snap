<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />

    <title>laravel vue js crud operation</title>

    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>
<div id="app"></div>
<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
