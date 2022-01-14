<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index(){
    	$books = Book::orderBy('created_at', 'desc')->paginate(10);
    	return view('index', compact('books'));
    }

    public function showBook($id){
    	$book=Book::find($id);
    	return view('show', compact('book'));
    }


    public function updateBook( Request $request, $id){
    	$validated = $request->validate([$request->all()]);
    	$book = Book::find($id);
    	$book->update($request->all());
    	return back()->with('success', 'The book '.$book->name. ' has been updated');
    }


    public function deleteBook($id){
    	$book = Book::find($id);
    	$bookName = $book->name;
    	$book->delete();
    	return back()->with('success', 'The book '.$bookName. ' has been deleted');
    }
}
