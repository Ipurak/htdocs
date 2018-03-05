<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Book Management</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>

        </style>
    </head>
    <body>

        @include('layout/menu')

        <div class="album py-5 bg-light">
			<div class="container">

          <div class="col-lg-12">
            <!-- Title -->
            <h1 class="mt-4">{{$book->name}}</h1>
            <!-- Author -->
            <p class="lead">
              by
              <a href="#">Start Bootstrap</a>
            </p>
            <hr>
            <!-- ISBN -->
            <p>ISBN {{$book->isbn}}</p>
            <!-- Date/Time -->
            <p>{{$book->updated_at}}</p>
            <hr>
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{$book->image}}" alt="">
            <hr>
            <!-- Post Content -->
            {{$book->desc}}
            <hr>
          </div>
    	</div>

        
        
    </body>
     @include('layout/script')
</html>