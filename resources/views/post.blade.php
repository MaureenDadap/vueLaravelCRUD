<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Vue SPA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" value="{{ csrf_token() }}" />
</head>

<body>
    <div id="app"></div>
</body>

</html>
