<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite ('resources/css/app.css')
</head>

<body class="">
    <h1 class="text-3xl font-bold text-blue-600">Mon blog</h1>
</body>
</html>
