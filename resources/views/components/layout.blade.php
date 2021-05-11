<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    {{$style ?? ''}}
    <title>{{$title ?? ''}}</title>
</head>
<body>
    <x-_navbar/>
    {{$slot}}
    <x-_footer/>
<script src="/js/app.js"></script>
@stack('scripts')
</body>
</html>