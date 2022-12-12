<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Vue SPA</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
        <div id="app">
            {{-- <example-div></example-div> --}}
        </div>
        {{-- <script src="{{ mix('js/app.js') }}" type="text/javascript"></script> --}}
    </body>
</html>