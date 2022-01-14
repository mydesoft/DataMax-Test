@if($errors->any())
<div class="alert alert-danger" id="err">
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
	
</div>
@endif

@if(session('success'))
<div class="alert alert-success" id="suc">
	{{session('success')}}
</div>
@endif


@if(session('error'))
<div class="alert alert-danger" id="error">
	{{session('error')}}
</div>
@endif