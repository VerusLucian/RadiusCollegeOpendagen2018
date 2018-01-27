<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form action="{{action('OpinionsController@store')}}" method="post">
    {{csrf_field()}}
    <div class="form-group rating">
        <label>
            <input type="radio" name="rating" value="5" title="5 stars"> 5
        </label>
        <label>
            <input type="radio" name="rating" value="4" title="4 stars"> 4
        </label>
        <label>
            <input type="radio" name="rating" value="3" title="3 stars"> 3
        </label>
        <label>
            <input type="radio" name="rating" value="2" title="2 stars"> 2
        </label>
        <label>
            <input type="radio" name="rating" value="1" title="1 star"> 1
        </label>
    </div>
    <input type="submit">
</form>



<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>