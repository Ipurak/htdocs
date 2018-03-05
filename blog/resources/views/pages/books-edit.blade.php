
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit Book</title>

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
				      <h1>Edit Book</h1>
              @include('message.alert-add-books')
              {!! Form::open(['action' => ['BooksController@update', $book->id], 'method' => 'POST']) !!}
                <div class="form-group">
                  {{Form::label('name','Name')}}
                  {{Form::text('name',$book->name,['class'=>'form-control','placeholder'=>'Book Name'])}}
                  {{Form::label('isbn','ISBN')}}
                  {{Form::text('isbn',$book->isbn,['class'=>'form-control','placeholder'=>'ISBN Code'])}}
                  {{Form::label('desc','Book Detail')}}
                  {{Form::text('desc',$book->desc,['class'=>'form-control','placeholder'=>'How about this book'])}}
                  {{Form::label('image','Image URL')}}
                  {{Form::text('image',$book->image,['class'=>'form-control','placeholder'=>'URL'])}}
                  {{Form::label('status','is it borrowed? 1 = Yes or 0 = No')}}
                  {{Form::text('status',$book->status,['class'=>'form-control','placeholder'=>'status'])}}
                </div>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Confirm', ['class'=>'btn btn-primary'])}}
              {!! Form::close() !!}
        	 </div>
    	   </div>
    </body>
        @include('layout/script')
</html>