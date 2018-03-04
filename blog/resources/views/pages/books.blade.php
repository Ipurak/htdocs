<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
          .avaliable{
            background-color: green;
          }

          .not-avaliable{
            background-color: red;
          }
        </style>
    </head>
    <body>

        @include('layout/menu')
        
        <div class="album py-5 bg-light">
    			<div class="container">
              {{$books->links()}}
              <div class="row">

                @foreach( $books as $book )

                  <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                      <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{$book->image}}" data-holder-rendered="true">
                      <div class="card-body">
                        <p><a href="/manage/{{$book->id}}"><b>{{$book->name}}</b></a></p>
                        <p>{{$book->isbn}}</p>
                        <p class="card-text">
                          {{ $book->desc }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            @if( $book->status == 0 )
                            <button type="button" class="btn btn-sm btn-success">I’d like to borrow this book</button>
                            @else
                            <button type="button" class="btn btn-sm btn-danger">Not avaliable</button>
                            @endif
                          </div>
                          <small class="text-muted">{{$book->updated_at}}</small>
                        </div>
                      </div>
                    </div>
                  </div>

                @endforeach
                
              </div>
          </div>
    	</div>

    </body>
     @include('layout/script')
</html>
