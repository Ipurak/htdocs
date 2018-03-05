<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'meBooks') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
        	.section{
        		background-image: url("https://cdn.wallpapersafari.com/46/48/aZJEwu.jpg");
    			background-color: #cccccc;
    			background-repeat: repeat;
    			color: #fff !important;
        	}
        </style>
    </head>
    <body>

        @include('layout/menu')

		<section class="jumbotron text-center section">
        <div class="container">
          <h1 class="jumbotron-heading">Search your books</h1>
          <p class="lead">
            Et aut ut unde laboriosam in eveniet est magni In et praesentium neque commodi ullamco hic iste Eum sit dolores autem nisi
            Sunt id officiis et consequatur maiores sunt hic repudiandae anim officia temporibus dolorem soluta porro asperiores nobis debitis nihil officia.
          </p>
          <p>
            {!! Form::open(['action' => ['BooksController@search'], 'method' => 'GET']) !!}
              <div class="input-group">
                {{Form::text('name','',['class'=>'form-control','placeholder'=>'Search book name'])}}
                <div class="input-group-btn">
                    {{Form::submit('Search', ['class'=>'btn btn-info'])}}
                </div>
              </div>
            {!! Form::close() !!}
          </p>
        </div>
      </section>


    </body>
    @include('layout/script')
</html>
