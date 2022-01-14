@extends('layouts.app')
@section('title', 'Book')

@section('content')
	<div style="margin-top: 100px;">
		<div class="row">
			<div class="container">
				<!-- <center> -->
					<div class="col-md-6 offset-md-3">
						<h5 class="text-center book-text mb-2"> <i class="fa fa-book"></i> Online Book Store</h5>
						@include('includes.message')
						<div class="card shadow-lg mt-4 mb-2 mt-">
							<div class="card-body">
								<h6 class="text-center book-text">Update {{$book->name}}</h6>
								<form method="POST" action="/update/book/{{$book->id}}" >
								@csrf
								{{method_field('PATCH')}}
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" value="{{$book->name}}" class="form-control" id="name">
									</div>

									<div class="form-group">
										<label>ISBN</label>
										<input type="text" name="isbn" value="{{$book->isbn}}" class="form-control" id="isbn">
									</div>

									<div class="form-group">
										<label>Authors</label>
										<textarea type="text" name="authors" class="form-control" id="authors">{{$book->authors}}</textarea>
									</div>

									<div class="form-group">
										<label>Country</label>
										<input type="text" name="country" value="{{$book->country}}" class="form-control" id="country">
									</div>

									<div class="form-group">
										<label>Pages</label>
										<input type="text" name="pages" value="{{$book->number_of_pages}}" class="form-control" id="pages">
									</div>

									<div class="form-group">
										<label>Publisher</label>
										<input type="text" name="publisher" value="{{$book->publisher}}" class="form-control" id="publisher">
									</div>

									<div class="form-group">
										<label>Released</label>
										<input type="text" name="released" value="{{$book->release_date}}" class="form-control" id="released">
									</div>

									<button class="btn text-white" style="background: #306">Update</button>
								</form>
							</div>

								
					   	</div>
					</div>
				<!-- </center> -->
				
			</div>
		</div>
	</div>
@endsection