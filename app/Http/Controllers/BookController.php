<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function __construct(BookRepository $bookRepository){

    	$this->bookRepository = $bookRepository;
    }

    public function searchBooks(Request $request){

    	$name = $request->name;

    	$book = $this->bookRepository->getSearchBook($name);

    	return response()->json([
    		'status_code' => 200,
    		'status' => 'success',
    		'data' => $book,
    	], 200);
    }



    public function createBook(Request $request){

    	$validator = $this->validateRequest();

    	if ($validator->fails()) {
    		return response()->json([
    			'status_code' => 406,
    			'status' => false,
    			'message' => $validator->errors()->all(),
    		], 406);
    	}

    	$book = $this->bookRepository->createNewBook();

    	return response()->json([
    		'status_code' => 200,
    		'status' => 'success',
    		'data' => $book,
    	], 200);


    }


    public function allBooks(){
    	$book = $this->bookRepository->readBooks();
    	return response()->json([
    		'status_code' => 200,
    		'status' => 'success',
    		'data' => $book,
    	], 200);
    }


    public function updateBook($id){
    	
    	$book = $this->bookRepository->updateSingleBook($id);

    	if ($book === 'no-record') {
    		return response()->json([
    			'status_code' => 404,
    			'status' => 'success',
    			'message' => 'No record found',
    		], 404);
    	}

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'data' => $book,
        ], 200);

    }


     public function deleteBook($id){
    	
    	$book = $this->bookRepository->deleteABook($id);

    	if ($book === 'no-record') {
    		return response()->json([
    			'status_code' => 404,
    			'status' => 'success',
    			'message' => 'No record found',
    		], 404);
    	}

    	return response()->json([
    			'status_code' => 204,
    			'status' => 'success',
    			'message' => 'The book ' . $book['name']. ' was deleted successfully',
    			'data' => $book['book'],
    		], 200);

    }


    public function showBook($id){
    	$book = $this->bookRepository->showSingleBook($id);

    	if ($book === 'no-record') {
    		return response()->json([
    			'status_code' => 404,
    			'status' => 'success',
    			'message' => 'No record found',
    		], 404);
    	}

    	return response()->json([
    		'status_code' => 200,
    		'status' => 'success',
    		'data' => $book,
    	], 200);
    	
    }


      public function validateRequest(){

    	return Validator::make(request()->all(), [
    		'name' => 'required',
    		'isbn' => 'required',
    		'authors' => 'required',
    		'country' => 'required',
    		'number_of_pages' => 'required | integer',
    		'publisher' => 'required',
    		'release_date' => 'required',
    	]);
    }
}
