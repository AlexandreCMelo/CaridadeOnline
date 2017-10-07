<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Charis</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>
@include('nav')
@yield('content')

</body>
</html>