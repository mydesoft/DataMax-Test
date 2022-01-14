<?php
namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\Http;


class BookRepository{

	public function getSearchBook($name){

		$response = Http::get('https://www.anapioficeandfire.com/api/books?name='.$name);

		$books = json_decode($response);

		$searchedBook = [];

		if (count($books) > 0) {

			foreach ($books as $key => $book) {

				$searchedBook[] = [
					'name' => $book->name,
					'isbn' => $book->isbn,
					'authors' => $book->authors,
					'number_of_pages' => $book->numberOfPages,
					'publisher' => $book->publisher,
					'country' => $book->country,
					'release_date' => $book->released,
				];
			}
		}
		else{
			return $searchedBook = [];
		}

		return $searchedBook;


	}


	public function createNewBook(){

		$validatedData = $this->requestData();

		$book = Book::create($validatedData);

		return [
					'name' => $book->name,
					'isbn' => $book->isbn,
					'authors' => [$book->authors],
					'number_of_pages' => $book->number_of_pages,
					'publisher' => $book->publisher,
					'country' => $book->country,
					'release_date' => $book->release_date,
		];


	}


	public function readBooks(){
		$books = Book::orderBy('created_at', 'asc')->get();
		$queryBooks = [];
		if (count($books) > 0) {
			foreach ($books as $key => $book) {
				$queryBooks[] =  [
						'id' => $book->id,
						'name' => $book->name,
						'isbn' => $book->isbn,
						'authors' => [$book->authors],
						'number_of_pages' => $book->number_of_pages,
						'publisher' => $book->publisher,
						'country' => $book->country,
						'release_date' => $book->release_date,
			];
			}
		}else{
			$queryBooks = [];
		
		}
		return $queryBooks;
	}

	public function updateSingleBook($id){

		$book = Book::where('id', $id)->first();
		if (!$book) {
			return 'no-record';
		}

		$data = $this->requestData();

		$book->update([
			'name' => $data['name'] ?? $book->name,
			'isbn' => $data['isbn'] ?? $book->isbn,
			'authors' => $data['authors'] ?? $book->authors,
			'number_of_pages' => $data['number_of_pages'] ?? $book->number_of_pages,
			'publisher' => $data['publisher'] ?? $book->publisher,
			'country' => $data['country'] ?? $book->country,
			'release_date' => $data['release_date'] ?? $book->release_date,
		]);

		return [
			'id' => $book->id,
			'name' => $book->name,
			'isbn' => $book->isbn,
			'authors' => [$book->authors],
			'number_of_pages' => $book->number_of_pages,
			'publisher' => $book->publisher,
			'country' => $book->country,
			'release_date' => $book->release_date,
		];

	}

	public function deleteABook($id){
		$book = Book::where('id', $id)->first();
		if (!$book) {
			return 'no-record';
		}
		$bookName = $book->name;
		$book->delete();
		return [
			'name' => $bookName,
			'book' => [],
		];

	}


	public function showSingleBook($id){
		$book= Book::where('id', $id)->first();
		if (!$book) {
			return 'no-record';
		}

		return [
			'id' => $book->id,
			'name' => $book->name,
			'isbn' => $book->isbn,
			'authors' => [$book->authors],
			'number_of_pages' => $book->number_of_pages,
			'publisher' => $book->publisher,
			'country' => $book->country,
			'release_date' => $book->release_date,
		];
	}

	public function requestData(){
		return [
			'name' => request()->name,
			'isbn' => request()->isbn,
			'authors' => request()->authors,
			'number_of_pages' => request()->number_of_pages,
			'publisher' => request()->publisher,
			'country' => request()->country,
			'release_date' => request()->release_date,
		];
	}
}