<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $Books = Books::orderBy('name','asc')->paginate(6);
        // return $Books;
        return view('pages.books-manage')->with('books', $Books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.books-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'isbn' => 'required',
            'desc' => 'required',
        ]);

        //New book
        $book = new Books;
        $book->name   = $request->input('name');
        $book->isbn   = $request->input('isbn');
        $book->image  = $request->input('image');
        $book->desc   = $request->input('desc');
        $book->status = 0;

        $book->save();
        return redirect('/manage')->with('success'.'The book have just added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Book = Books::find($id);
        return view('pages.books-view')->with('book',$Book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $Book = Books::find($id);
        return view('pages.books-edit')->with('book',$Book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'isbn' => 'required',
            'desc' => 'required',
        ]);

        //New book
        $book = Books::find($id);
        $book->name   = $request->input('name');
        $book->isbn   = $request->input('isbn');
        $book->image  = $request->input('image');
        $book->desc   = $request->input('desc');
        $book->status = 0;

        $book->save();
        return redirect('/manage')->with('success'.'The book have just edited.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
        return redirect('/manage')->with('success'.'The book have just deleted.');
    }

    public function booksList()
    {   
        $Books = Books::orderBy('name','desc')->paginate(6);
        return view('pages.books')->with('books',$Books);
    }
}
