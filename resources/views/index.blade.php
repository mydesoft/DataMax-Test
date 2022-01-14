@extends('layouts.app')
@section('title', 'Home')

@section('content')
	<div style="margin-top: 100px;">
		<div class="row">
			<div class="container">
				<!-- <center> -->
					<div class="col-md-8 offset-md-2">
							<h5 class="text-center book-text mb-2"> <i class="fa fa-book"></i> Online Book Store</h5>
						@include('includes.message')

						@if($books->count() > 0)
							@foreach($books as $book)
							<div class="card shadow-lg mt-4">
							<div class="card-body">
								<h6 class="text-center book-text">Book Name: {{$book->name}}</h6>

								<ul class="list-group">
									<li class="list-group-item" >
										
											<a href="/show-book/{{$book->id}}" class="btn pull-right btn-sm text-white mb-2" style="background: #306;"> </i> View</a>
											<h6 class="book-view"> ISBN</span> : <span class="content">{{$book->isbn}}</span></h6>
											<h6 class="book-view">Authors : <span class="content">{{$book->authors}}</span></h6>
											<h6 class="book-view">Country : {{$book->country}}</h6>
											<h6 class="book-view">Pages : {{$book->number_of_pages}}</h6>
											<h6 class="book-view">Publisher : {{$book->publisher}}</h6>
											<h6 class="book-view">Released : {{$book->release_date}}</h6>					
									</li>
									
									
								</ul>
							</div>

							<div class="container">
								<a href="{{route('deleteBook', $book->id)}}" class="btn pull-right btn-danger mb-2 btn-sm"> <i class="fa fa-trash"></i> Delete</a>
							</div>	
					   	</div>
							@endforeach
						@else
							<h4>No Books Yet</h4>
						@endif
					   	
				<!-- </center> -->
				
			</div>
		</div>
	</div>
</div>
@endsection
