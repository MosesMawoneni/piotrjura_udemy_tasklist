<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 Task List</title>
    @yield("styles")
</head>
<body>
    <div>
        @if(session()->has("success"))
        <div>{{ session("success") }}</div>
        @endif
        <h1>@yield("title")</h1>
        @yield("content")
    </div>
</body>
</html>