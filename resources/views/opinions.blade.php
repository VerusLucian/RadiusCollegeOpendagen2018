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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<div class="container" style="margin-top: 50px;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->


        <!-- Wrapper for slides -->
        <div class="carousel-inner text-center">
            <div class="item active col-md-8 col-md-offset-2">
                <h4>Welcom op open dagen 2018</h4>
                <h4>Van</h4>
                <h3>Radius College</h3>
            </div>
            @foreach($opinions as $opinion)
                <div class="item col-md-8 col-md-offset-2">
                    <h4  class="">{{$opinion->description}}</h4>
                    <h4> {{$opinion->name}}</h4>
                    <div class="rating">
                        @for($i = 0; $i < $opinion->rating; $i++)
                            <label class="selected">
                                <input type="radio" name="rating" value="5" title="5 stars" disabled="disabled" style="font-size: 24px;">
                            </label>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="container">
    @if (\Illuminate\Support\Facades\Session::has('msg'))
        <div class="alert alert-success text-center">
            <ul style="list-style-type: none;">
                <li>{!! \Illuminate\Support\Facades\Session::get('msg') !!}</li>
            </ul>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul style="list-style-type: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{action('OpinionsController@store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Uw mening</label>
            <textarea class="form-control" rows="5" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="">Uw naam</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group pull-left">
            <label for="">Uw beoordeling</label>
            <div class="rating">
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

        </div>
        <div class="form-group ">
            <input type="submit" class="btn btn-lg btn-primary pull-right submit" value="Toevoegen">
        </div>
    </form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>