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
        @include('message.alert-add-books')
        <div class="album py-5 bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<a href="manage/create" class="btn btn-info" role="button">Add a new book</a><br><br>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{$books->links()}}
					</div>
				</div>
		          <div class="row">
		          	
		          		@foreach( $books as $book )

		          			<div class="col-md-4">
				              <div class="card mb-4 box-shadow">
				                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{$book->image}}" data-holder-rendered="true">
				                <div class="card-body">
				                  <p><a href="/manage/{{$book->id}}"><b>{{$book->name}}</b></a></p>
				                  <p>{{$book->isbn}}</p>
				                  <p class="card-text">{{$book->desc}}</p>
				                  <div class="d-flex justify-content-between align-items-center">
				                    <div class="btn-group">
				                      <button type="button" class="btn btn-sm btn-outline-secondary view-book" id="{{$book->id}}">View</button>
				                      <button type="button" class="btn btn-sm btn-outline-secondary edit-book" id="{{$book->id}}">Edit</button>
				                    </div>
				                    {!!Form::open(['action'=>['BooksController@destroy', $book->id], 'method' => 'POST', 'class' => 'delete-book'])!!}
				                      	{{Form::hidden('_method','DELETE')}}
				                      	{{Form::submit('Delete', ['class' => 'btn btn-sm btn-outline-secondary'])}}
				                      {!!Form::close()!!}
				                    <small class="text-muted">{{$book->updated_at}}</small>
				                  </div>
				                </div>
				              </div>
			            	</div>

		          		@endforeach
		          	
		          </div>
		          <div class="row">
					<div class="col-md-12">
						{{$books->links()}}
					</div>
				</div>
        	</div>
    	</div>

        
        
    </body>
     @include('layout/script')
     <script type="text/javascript">


     	var view_book = document.getElementsByClassName("view-book");
		for (var i = 0; i < view_book.length; i++) {
		    view_book[i].addEventListener('click', view);
		}

		var edit_book = document.getElementsByClassName("edit-book");
		for (var i = 0; i < edit_book.length; i++) {
		    edit_book[i].addEventListener('click', edit);
		}

		function view(){
		    window.open('manage/'+this.getAttribute("id"),'_blank');
		}

		function edit(){
		    window.open('manage/'+this.getAttribute("id")+'/edit','_blank');
		}
     </script>
</html>